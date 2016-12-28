<?php
require 'app/Config.inc.php';
?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Europeana Vs Tainacan</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>
        <section class="register">  

            <header>
                <a class="j_open openform" rel="itemcreate"></a>
                <h1>Europeana &amp; Tainacan</h1>
                <p>Coletando dados do repositório da Europeana e passando para o Tainacan!</p>
            </header>

            <form name="item_register" class="j_formsubmit itemcreate" method="post" action="">
                <div class="trigger-box"></div>                
                <input class="noclear" type="hidden" name="operation" value="register"/>
                <input type="text" name="colecao" placeholder="Endereço da Coleção no Tainacan:"/><br><br>
                <input type="radio" class="noclear" name="metadados" value="standart" checked="checked"/> Standart<br>
                <input type="radio" class="noclear" name="metadados" value="full"/> Full<br><br>
                <input type="text" name="search" placeholder="Pesquisar por:"/>
                <button>Buscar e Inserir!</button>
                <img class="form_load" src="img/load.gif" alt="[CARREGANDO...]" title="CARREGANDO..."/>
            </form>
        </section>  

        <section class="search">  

            <header>
                <a class="j_open_search openform" rel="itemsearch"></a>
                <h1>Buscar na Europeana</h1>
                <p>Pesquisando na Europeana e visualizando o retorno!</p>
            </header>

            <form name="item_search" class="j_formsubmit_search itemsearch" method="post" action="">
                <div class="trigger-box"></div>                
                <input class="noclear" type="hidden" name="operation" value="search"/>
                <input type="text" name="search" placeholder="Pesquisar por:"/>
                <button>Buscar e Visualizar!</button>
                <img class="form_load" src="img/load.gif" alt="[CARREGANDO...]" title="CARREGANDO..."/>

                <div class="j_list"></div>
            </form>

        </section>        

        <script src="js/jquery.js"></script>        
        <script src="js/jquery.form.js"></script>        
        <script src="js/script.js"></script>
    </body>
</html>
