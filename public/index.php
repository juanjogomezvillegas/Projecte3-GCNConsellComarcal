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

$contenidor = new \Emeset\Contenidor($config);
$peticio = $contenidor->peticio();
$resposta = $contenidor->resposta();
$modelPDO = $contenidor->modelPDO();

$r = $_REQUEST["r"];

if ($r === "login") {
    $resposta = ctrlLogin($peticio, $resposta, $contenidor);
} else if ($r === "dologin") {
    $resposta = ctrlDoLogin($peticio, $resposta, $contenidor);
} else if ($r === "logout") {
    $resposta = ctrlLogout($peticio, $resposta, $contenidor);
} else if ($r === "registre") {
    $resposta = ctrlRegistre($peticio, $resposta, $contenidor);
} else if ($r === "article") {
    $resposta = ctrlArticle($peticio, $resposta, $contenidor);
} else if ($r === "blog") {
    $resposta = ctrlBlog($peticio, $resposta, $contenidor);
} else if ($r === "tramit") {
    $resposta = ctrlTramit($peticio, $resposta, $contenidor);
} else if ($r === "admin") {
    $resposta = ctrlAdmin($peticio, $resposta, $contenidor);
}