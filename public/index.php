<?php

error_reporting(E_ERROR | E_WARNING | E_PARSE);

/*Inclou el fitxer config.php*/
include "../src/config.php";

/*Afegim els controladors necessaris per executar tots els requests*/
include "../src/controladors/index.php";
include "../src/controladors/article.php";
include "../src/controladors/login.php";
include "../src/controladors/registre.php";
include "../src/controladors/blog.php";
include "../src/controladors/tramit.php";
include "../src/controladors/admin.php";


/*Creem els diferents models necessaris per executar la pagina */




$r = $_REQUEST["r"];

if ($r === "index") {
    $resposta = ctrlIndex($peticio, $resposta, $contenidor);
}
elseif ($r === "article") {
    $resposta = ctrlArticle($peticio, $resposta, $contenidor);
}
elseif ($r === "login") {
    $resposta = ctrlLogin($peticio, $resposta, $contenidor);
}
elseif ($r === "registre") {
    $resposta = ctrlRegistre($peticio, $resposta, $contenidor);
}
elseif ($r === "blog") {
    $resposta = ctrlBlog($peticio, $resposta, $contenidor);
}
elseif ($r === "tramit") {
    $resposta = ctrlTramit($peticio, $resposta, $contenidor);
}
elseif ($r === "admin") {
    $resposta = ctrlAdmin($peticio, $resposta, $contenidor);
}

