<?php

error_reporting(E_ERROR | E_WARNING | E_PARSE);

/*Inclou el fitxer config.php*/
include "../src/config.php";

/*Afegim els controladors necessaris per executar tots els requests*/
include "../src/controller/portada.php";
include "../src/controller/login.php";
include "../src/controller/dologin.php";
include "../src/controller/doregistre.php";
include "../src/controller/doregistreadmin.php";
include "../src/controller/registre.php";
include "../src/controller/registreadmin.php";
include "../src/controller/article.php";
include "../src/controller/blog.php";
include "../src/controller/tramit.php";
include "../src/controller/admin.php";
include "../src/controller/llistarusuari.php";
include "../src/controller/llistararticle.php";
include "../src/controller/llistarcategoria.php";
include "../src/controller/esborrarusuari.php";
include "../src/controller/esborrararticle.php";
include "../src/controller/esborrarcategoria.php";


$contenidor = new \Emeset\Contenidor($config);
$app = new \Emeset\Emeset($contenidor);


$app->ruta("", "ctrlPortada");
$app->ruta("login", "ctrlLogin");

$app->ruta("esborrarcategoria", "ctrlEsborrarcategoria");
$app->ruta("esborrararticle", "ctrlEsborrararticle");
$app->ruta("esborrarusuari", "ctrlEsborrarusuari");
$app->ruta("llistarcategoria", "ctrlLlistarcategoria");
$app->ruta("llistararticle", "ctrlLlistararticle");
$app->ruta("llistarusuari", "ctrlLlistarusuari");
$app->ruta("dologin", "ctrlDoLogin");
$app->ruta("doregistre", "ctrlDoRegistre");
$app->ruta("doregistreadmin", "ctrlDoRegistreAdmin");
$app->ruta("logout", "ctrlLogout");
$app->ruta("registre", "ctrlRegistre");
$app->ruta("registreadmin", "ctrlRegistreAdmin");
$app->ruta("article", "ctrlArticle");
$app->ruta("blog", "ctrlBlog");
$app->ruta("tramit", "ctrlTramit");
$app->ruta("admin", "ctrlAdmin");



$app->executa();