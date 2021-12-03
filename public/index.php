<?php

error_reporting(E_ERROR | E_WARNING | E_PARSE);

/*Inclou el fitxer config.php*/
require_once "../src/config.php";

/*Afegim els controladors necessaris per executar tots els requests*/
require_once "../src/controller/portada.php";
require_once "../src/controller/login.php";
require_once "../src/controller/dologin.php";
require_once "../src/controller/logout.php";
require_once "../src/controller/doregistre.php";
require_once "../src/controller/docrearcategoria.php";
require_once "../src/controller/doregistreadmin.php";
require_once "../src/controller/registre.php";
require_once "../src/controller/registreadmin.php";
require_once "../src/controller/article.php";
require_once "../src/controller/blog.php";
require_once "../src/controller/tramit.php";
require_once "../src/controller/admin.php";
require_once "../src/controller/llistarusuari.php";
require_once "../src/controller/llistararticle.php";
require_once "../src/controller/llistarcategoria.php";
require_once "../src/controller/crearcategoria.php";
require_once "../src/controller/esborrarusuari.php";
require_once "../src/controller/esborrararticle.php";
require_once "../src/controller/esborrarcategoria.php";
require_once "../src/controller/actualitzararticle.php";

require_once "../src/middleware/middleCentral.php";
require_once "../src/middleware/middleLogat.php";

$contenidor = new \Emeset\Contenidor($config);
$app = new \Emeset\Emeset($contenidor);

$app->ruta("", "ctrlPortada", ["middleCentral"]);
$app->ruta("article", "ctrlArticle", ["middleCentral"]);
$app->ruta("tramit", "ctrlTramit", ["middleCentral"]);
$app->ruta("blog", "ctrlBlog", ["middleCentral"]);
$app->ruta("login", "ctrlLogin", ["middleCentral"]);
$app->ruta("dologin", "ctrlDoLogin", ["middleCentral"]);
$app->ruta("registre", "ctrlRegistre", ["middleCentral"]);
$app->ruta("doregistre", "ctrlDoRegistre", ["middleCentral"]);
$app->ruta("logout", "ctrlLogout", ["middleCentral", "middleLogat"]);
$app->ruta("admin", "ctrlAdmin", ["middleCentral", "middleLogat"]);
$app->ruta("llistarcategoria", "ctrlLlistarcategoria", ["middleCentral", "middleLogat"]);
$app->ruta("crearcategoria", "ctrlCrearCategoria", ["middleCentral", "middleLogat"]);
$app->ruta("docrearcategoria", "ctrlDoCrearCategoria", ["middleCentral", "middleLogat"]);
$app->ruta("esborrarcategoria", "ctrlEsborrarcategoria", ["middleCentral", "middleLogat"]);
$app->ruta("llistararticle", "ctrlLlistararticle", ["middleCentral", "middleLogat"]);
$app->ruta("esborrararticle", "ctrlEsborrararticle", ["middleCentral", "middleLogat"]);
$app->ruta("actualitzararticle", "ctrlActualitzararticle", ["middleCentral", "middleLogat"]);
$app->ruta("llistarusuari", "ctrlLlistarusuari", ["middleCentral", "middleLogat"]);
$app->ruta("registreadmin", "ctrlRegistreAdmin", ["middleCentral", "middleLogat"]);
$app->ruta("doregistreadmin", "ctrlDoRegistreAdmin", ["middleCentral", "middleLogat"]);
$app->ruta("esborrarusuari", "ctrlEsborrarusuari", ["middleCentral", "middleLogat"]);

$app->executa();