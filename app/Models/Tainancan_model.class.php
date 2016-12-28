<?php

ini_set('max_input_vars', '10000');
//error_reporting(0);
session_write_close();
ini_set('max_execution_time', '0');
ini_set('memory_limit', '-1');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Europeana_model
 *
 * @author MB
 */
class Tainancan_model {

    public $Url_site;
    public $Url_base;
    public $Root_category;
    public $Item_type;
    public $Item_content;
    public $Item_from;
    public $User;
    public $Pass;
    public $Query;
    public $Result;
    public $totalResults;
    public $InsertedItems;

    function __construct() {
        $this->Url_site = 'http://en.gi.fic.ufg.br/';
        $this->Url_base = $this->Url_site . 'wp-json/posts/';
        //$this->Root_category = 138;
        $this->Item_type = 'image';
        $this->Item_from = 'external';
        $this->User = 'admin';
        $this->Pass = '%$#@!trgfbv';
        $this->InsertedItems = 0;
    }
    
    function getInsertedItems() {
        return $this->InsertedItems;
    }

    function insert_items_full(array $items, array $metadados) {
        $this->InsertedItems = 0;
        if (!empty($items)) {
            foreach ($items as $item) {
                $this->Item_type = (isset($item["type"]) ? $this->setType($item['type'], $item["guid"]) : false);
                $thumb = (isset($item["edmPreview"]) && is_array($item["edmPreview"]) ? $this->setImage($item['edmPreview'][0]) : false);

                if ($this->Item_type && $thumb) {
                    $this->DoInsert($item, $thumb, true, $metadados);
                }
            }
        }
    }

    function insert_items(array $items) {
        if (!empty($items)) {
            foreach ($items as $item) {
                $this->Item_type = (isset($item["type"]) ? $this->setType($item['type'], $item["guid"]) : false);
                $thumb = (isset($item["edmPreview"]) && is_array($item["edmPreview"]) ? $this->setImage($item['edmPreview'][0]) : false);

                if ($this->Item_type && $thumb) {
                    $this->DoInsert($item, $thumb, true);
                }
            }
        }
    }

    function DoInsert(array $item, $thumb, $curl = false, $post_meta_full = false) {
        $this->InsertedItems++;
        $data = array('user' => $this->User,
            'pass' => $this->Pass,
            'title' => (isset($item["title"]) && is_array($item["title"]) ? $item["title"][0] : $item["title"]),
            'content_raw' => (isset($item["dcDescriptionLangAware"]['def']) && is_array($item["dcDescriptionLangAware"]['def']) ? implode(', ', $item["dcDescriptionLangAware"]['def']) : ''),
            'status' => 'publish',
            'type' => 'socialdb_object',
            'x-categories' => array($this->Root_category),
            'post_meta' => array(
                array('key' => 'socialdb_object_dc_type', 'value' => $this->Item_type),
                array('key' => 'socialdb_object_content', 'value' => ($this->Item_content ? $this->Item_content : (isset($item["edmPreview"]) && is_array($item["edmPreview"]) ? $item["edmPreview"][0] : (isset($item["edmIsShownAt"][0]) ? $item["edmIsShownAt"][0] : $item["guid"])))),
                array('key' => 'socialdb_object_dc_source', 'value' => $item["guid"]),
                array('key' => 'socialdb_object_from', 'value' => $this->Item_from),
                array('key' => 'link_thumb', 'value' => $thumb)
            )
        );

        if ($post_meta_full) {
            foreach ($post_meta_full as $meta) {
                $meta_value = '';
                if (isset($item[$meta['metadado']])) {
                    if (is_array($item[$meta['metadado']])) {
                        $first_key = key($item[$meta['metadado']]);
                        if(is_array($item[$meta['metadado']][$first_key])) {
                            foreach ($item[$meta['metadado']] as $meta_array){
                                $meta_value .= implode(', ', $meta_array);
                            }
                        }else{
                            $meta_value = implode(', ', $item[$meta['metadado']]);
                        }
                    }else{
                        $meta_value = $item[$meta['metadado']];
                    }
                    
                    $data['post_meta'][] = array(
                        'key' => 'socialdb_property_' . $meta['metadata_id'], 'value' => (string) $meta_value
                    );
                }
            }
        }

        if (!$curl) {
            // use key 'http' even if you send the request to https://...
            $options = array(
                'http' => array(
                    'header' => "Content-type: application/json; charset=UTF-8\r\n",
                    'method' => 'POST',
                    'content' => json_encode($data)
                )
            );
            $context = stream_context_create($options);
            $result = file_get_contents($this->Url_base, false, $context);
            if ($result === FALSE) {
                /* Handle error */
            }

            // Decode the response
            $responseData = json_decode($result, TRUE);

            // Print the date from the response
            //echo $responseData['published'];
            //var_dump($result, $responseData);
        } else {

            // Setup cURL
            $ch = curl_init($this->Url_base);
            curl_setopt_array($ch, array(
                CURLOPT_POST => TRUE,
                CURLOPT_RETURNTRANSFER => TRUE,
                CURLOPT_HTTPHEADER => array(
                    'Content-Type: application/json'
                ),
                CURLOPT_POSTFIELDS => json_encode($data)
            ));

            // Send the request
            $response = curl_exec($ch);
            //$reponseInfo = curl_getinfo($ch);
            // Check for errors
            if ($response === FALSE) {
                die(curl_error($ch));
            }

            // Decode the response
            $responseData = json_decode($response, TRUE);

            // Print the date from the response
            //echo $responseData['published'];
            //var_dump($responseData);

            curl_close($ch);
        }
    }

    function setType($type, $content) {
        switch ($type):
            case 'TEXT':
                $new_type = 'other';
                $this->Item_content = $content;
                break;

            case 'IMAGE':
                $new_type = 'image';
                $this->Item_content = false;
                break;

            case 'SOUND':
                $new_type = 'other';
                $this->Item_content = $content;
                break;

            case 'VIDEO':
                $new_type = 'video';
                $this->Item_content = false;
                break;

            case '3D':
                $new_type = 'other';
                $this->Item_content = $content;
                break;

            default:
                $new_type = 'other';
                $this->Item_content = $content;
                break;
        endswitch;

        return strtolower($new_type);
    }

    function setImage($image) {
        //http://europeanastatic.eu/api/image?uri=http%3A%2F%2Fpurl.pt%2F13970%2Fcover.get&size=LARGE&type=TEXT

        $new_image = explode('&', $image)[0];
        $new_image = $this->removeQueryInImageUrl($new_image);

        return $new_image;
    }

    public function removeQueryInImageUrl($url) {
        $types = ['jpg', 'jpeg', 'png', 'gif'];
        foreach ($types as $type) {
            if (strpos($url, $type) !== false) {
                $uri = parse_url($url);
                $uri = explode('=', urldecode($uri['query']))[1];
                $url = parse_url($uri);
                return sprintf('%s://%s%s', $url['scheme'], $url['host'], $url['path']);
            }
        }
        return $url;
    }

    public function getCollection($name) {
        // URL do site + /wp-json/posts?type=socialdb_collection&filter[name]=AQUI
        $qry_str = "wp-json/posts?type=socialdb_collection&filter[name]=" . $name . "&user={$this->User}&password=" . base64_encode($this->Pass);
        $ch = curl_init();

        // Set query data here with the URL
        curl_setopt($ch, CURLOPT_URL, $this->Url_site . $qry_str);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, '3');
        $content = trim(curl_exec($ch));
        curl_close($ch);
        $content = json_decode($content, true);

        if (empty($content)) {
            return false;
        } else {
            return $content[0]["ID"];
        }
    }

    public function getRootCategory($collection_id) {
        // URL do site + /wp-json/posts?type=socialdb_collection&filter[name]=AQUI
        $qry_str = "wp-json/posts/" . $collection_id . "/meta?user={$this->User}&password=" . base64_encode($this->Pass);
        $ch = curl_init();

        // Set query data here with the URL
        curl_setopt($ch, CURLOPT_URL, $this->Url_site . $qry_str);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, '3');
        $content = trim(curl_exec($ch));
        curl_close($ch);
        $content = json_decode($content, true);

        if (empty($content)) {
            return false;
        } else {
            foreach ($content as $value) {
                if ($value['key'] == "socialdb_collection_object_type") {
                    $this->Root_category = $value["value"];
                    return $value["value"];
                }
            }
        }
    }

    public function createMetadata($metadado, $type = 'text') {
        $data = array('user' => $this->User,
            'pass' => $this->Pass,
            'name' => $metadado,
            'taxonomy' => 'socialdb_property_type',
            'parent' => 'data',
            'slug' => $metadado . '_' . time(),
            'term_meta' => array(
                array('key' => 'socialdb_property_created_category', 'value' => $this->Root_category),
                array('key' => 'socialdb_property_data_widget', 'value' => $type)
            )
        );

        // Setup cURL
        $ch = curl_init($this->Url_site . 'wp-json/term/');
        curl_setopt_array($ch, array(
            CURLOPT_POST => TRUE,
            CURLOPT_RETURNTRANSFER => TRUE,
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json'
            ),
            CURLOPT_POSTFIELDS => json_encode($data)
        ));

        // Send the request
        $response = curl_exec($ch);
        //$reponseInfo = curl_getinfo($ch);
        // Check for errors
        if ($response === FALSE) {
            die(curl_error($ch));
        }

        // Decode the response
        $responseData = json_decode($response, TRUE);

        // Print the date from the response
        //echo $responseData['published'];

        curl_close($ch);

        return $responseData;
    }

}
