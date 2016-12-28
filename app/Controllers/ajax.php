<?php

$getPost = filter_input_array(INPUT_POST, FILTER_DEFAULT);
$setPost = array_map('strip_tags', $getPost);
$Post = array_map('trim', $setPost);

$Action = $Post['operation'];
$jSon = array();
unset($Post['action']);
sleep(1);

if ($Action):
    require '../Config.inc.php';
    $Eur_Model = new Europeana_model;
    $Tai_Model = new Tainancan_model;
    //Banco de dados
    $Read = new Read;
    $Create = new Create;
    $Update = new Update;
    $Delete = new Delete;
endif;

switch ($Action):

    case 'register':
        if (in_array('', $Post)):
            $jSon['error'] = "<b>OPPSSS:</b> Preencha o campo de busca!";
        else:
            $url_colecao = explode('/', $Post["colecao"]);
            if (count($url_colecao) > 1) {
                foreach ($url_colecao as $key => $parts) {
                    if ($parts == 'collection') {
                        $index = $key + 1;
                    }
                }
                $url_colecao = $url_colecao[$index];
            } else {
                $url_colecao = $url_colecao[0];
            }

            $collection_id = $Tai_Model->getCollection($url_colecao);
            if (!$collection_id) {
                $jSon['error'] = "<b>OPPSSS:</b> A coleção <i>{$url_colecao}</i> não foi encontrada ou não existe!";
            } else {
                $root_category = $Tai_Model->getRootCategory($collection_id);
                if (!$root_category) {
                    $jSon['error'] = "<b>OPPSSS:</b> Erro ao encontrar a Root Collection. Entre em contato com o administrador do sistema!";
                } else {
                    $Eur_Model->Search($Post['search']);
                    $result_itens = $Eur_Model->getResult();

                    if (!empty($result_itens)) {
                        if ($Post["metadados"] == 'standart') {
                            $Tai_Model->insert_items($result_itens);
                            $jSon['success'] = "Busca e Inserções realizadas com sucesso!";
                        } else {
                            $metadados = array();
                            foreach ($result_itens as $item) {
                                foreach ($item as $key => $value) {
                                    if (!in_array($key, $metadados)) {
                                        $metadados[] = $key;
                                    }
                                }
                            }
                            if (!empty($metadados)) {
                                $Read->ExeRead('metadados', "WHERE collection_id = :id", "id={$collection_id}");
                                if ($Read->getRowCount() > 0) {
                                    //achou metadados na tabela do banco para esta coleção
                                    $old_metadados = unserialize($Read->getResult()[0]['metadados']);
                                    $new_metadados = array();
                                    foreach ($metadados as $metadado) {
                                        if (!in_array($metadado, $old_metadados)) {
                                            $new_metadados[] = $metadado;
                                        }
                                    }

                                    if (!empty($new_metadados)) {
                                        $new_metadados_bd = array_merge($old_metadados, $new_metadados);
                                        $Dados = array(
                                            'metadados' => serialize($new_metadados_bd)
                                        );
                                        $Update->ExeUpdate('metadados', $Dados, "WHERE id = :id", "id={$Read->getResult()[0]['id']}");
                                        if ($Update->getResult()) {
                                            //Cria no tainacan os novos metadados
                                            foreach ($new_metadados as $metadado) {
                                                $created_metadata = $Tai_Model->createMetadata($metadado);
                                                $Dados = array(
                                                    'metadado' => $metadado,
                                                    'metadata_id' => $created_metadata["ID"],
                                                    'collection_id' => $collection_id
                                                );
                                                $Create->ExeCreate('metadados_tainacan', $Dados);
                                            }
                                        }
                                    }
                                    
                                } else {
                                    $Dados = array(
                                        'metadados' => serialize($metadados),
                                        'collection_id' => $collection_id
                                    );
                                    $Create->ExeCreate('metadados', $Dados);

                                    if ($Create->getResult()) {
                                        //Cria no tainacan os metadados
                                        foreach ($metadados as $metadado) {
                                            $created_metadata = $Tai_Model->createMetadata($metadado);
                                            $Dados = array(
                                                'metadado' => $metadado,
                                                'metadata_id' => $created_metadata["ID"],
                                                'collection_id' => $collection_id
                                            );
                                            $Create->ExeCreate('metadados_tainacan', $Dados);
                                        }
                                    }
                                }
                                
                                //Agora busca os IDS dos metadados e é só fazer a inserção dos itens
                                $Read->ExeRead('metadados_tainacan', "WHERE collection_id = :id", "id={$collection_id}");
                                if($Read->getResult()){
                                    //tem o array de metadados
                                    $Tai_Model->insert_items_full($result_itens, $Read->getResult());
                                    $jSon['success'] = "Busca e Inserções realizadas com sucesso! Foram inseridos {$Tai_Model->getInsertedItems()} itens";
                                    
                                }else{
                                    $jSon['error'] = "<b>OPPSSS:</b> Erro ao encontrar metadados da coleção. Entre em contato com o administrador do sistema!";
                                }
                                
                            } else {
                                $jSon['error'] = "<b>OPPSSS:</b> Erro ao encontrar metadados dos itens. Entre em contato com o administrador do sistema!";
                            }
                            //var_dump($Read->getResult(), $Read->getRowCount());
                        }
                    } else {
                        $jSon['error'] = "<b>OPPSSS:</b> Nenhum item encontrado na busca!";
                    }
                }
            }
        //var_dump($url_colecao);
        //exit();
//            $Eur_Model->Search($Post['search']);
//            $result_itens = $Eur_Model->getResult();
////            var_dump($result_itens[0]);
////            exit();
//            if (!empty($result_itens)) {
//                $Tai_Model->insert_items($result_itens);
////            exit();
//                $jSon['success'] = "Busca e Inserções realizadas com sucesso!";
//            } else {
//                $jSon['error'] = "<b>OPPSSS:</b> Nenhum item encontrado na busca!";
//            }
        endif;
        break;

    case 'search':
        if (in_array('', $Post)):
            $jSon['error'] = "<b>OPPSSS:</b> Preencha o campo de busca!";
        else:
            $Eur_Model->Search($Post['search']);
            $result_itens = $Eur_Model->getResult();
            $result_totalitens = $Eur_Model->getTotalResults();
//            var_dump($result_itens[0]);
//            exit();
            if (!empty($result_itens)) {
                $jSon['success'] = "Busca e Inserções realizadas com sucesso!";
                $jSon['result'] = $result_itens[0];
                $jSon['totalresult'] = "<b>Itens encontrados</b> (aprox.): {$result_totalitens}<br><br>";
            } else {
                $jSon['error'] = "<b>OPPSSS:</b> Nenhum item encontrado na busca!";
            }
        endif;
        break;

    default :
        $jSon['error'] = "Erro ao Selecionar Ação!";
endswitch;

echo json_encode($jSon);
