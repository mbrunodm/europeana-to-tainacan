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
class Europeana_model {

    public $Url_base;
    public $Cursor;
    public $Rows;
    public $Profile;
    public $Query;
    public $Wskey;
    public $Result;
    public $totalResults;

    function __construct() {
        $this->Url_base = 'http://www.europeana.eu/api/v2/search.json?wskey=%s&query=%s&cursor=%s&rows=%s&profile=%s';
        $this->Wskey = EUR_API_KEY;
        $this->Cursor = '*';
        $this->Rows = '100';
        $this->Profile = 'rich';
    }

    function getResult() {
        return $this->Result;
    }

    function getTotalResults() {
        return $this->totalResults;
    }
    
    public function Search($search) {
        $this->Result = array();
        $this->Query = urlencode($search);
        $result = $this->DoSearch();
    }

    public function DoSearch() {
        $url = sprintf($this->Url_base, $this->Wskey, $this->Query, $this->Cursor, $this->Rows, $this->Profile);

        $resposta = file_get_contents($url);
        $json = json_decode($resposta, true);

        if (isset($json["items"])) {
            foreach ($json["items"] as $item) {
                $this->Result[] = $item;
            }
        }
        $this->totalResults = (isset($json['totalResults']) ? $json['totalResults'] : null);
        $this->Cursor = (isset($json['nextCursor']) ? urlencode($json['nextCursor']) : null);

        if ($this->Cursor) {
            $this->DoSearch();
        }
    }

}
