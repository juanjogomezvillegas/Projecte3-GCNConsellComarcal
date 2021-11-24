<?php

error_reporting(E_ERROR | E_WARNING | E_PARSE);

/*Inclou el fitxer config.php*/
include "../src/config.php";

/*Afegim els controladors necessaris per executar tots els requests*/
include "../src/controller/portada.php";
include "../src/controller/article.php";
include "../src/controller/login.php";
include "../src/controller/registre.php";
include "../src/controller/blog.php";
include "../src/controller/tramit.php";
include "../src/controller/admin.php";

$contenidor = new \Emeset\Contenidor($config);
$peticio = $contenidor->peticio();
$resposta = $contenidor->resposta();

$r = $_REQUEST["r"];

if ($r === "") {
    $resposta = ctrlPortada($peticio, $resposta, $contenidor);
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
elseif ($r === "portada") {
    $resposta = ctrlPortada($peticio, $resposta, $contenidor);
}

$resposta->resposta();