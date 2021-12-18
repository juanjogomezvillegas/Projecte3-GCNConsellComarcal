<?php

error_reporting(E_ERROR | E_WARNING | E_PARSE);

/*Inclou el fitxer config.php*/
require_once "../src/config.php";
/*Afegim els controladors necessaris per executar tots els requests*/
require_once "../src/controller/ajaxFavorits.php";
require_once "../src/controller/ajaxServer.php";
require_once "../src/controller/portada.php";
require_once "../src/controller/perfilusuari.php";
require_once "../src/controller/login.php";
require_once "../src/controller/dologin.php";
require_once "../src/controller/logout.php";
require_once "../src/controller/doregistre.php";
require_once "../src/controller/docrearcategoria.php";
require_once "../src/controller/docreararticle.php";
require_once "../src/controller/doregistreadmin.php";
require_once "../src/controller/docontacte.php";
require_once "../src/controller/registre.php";
require_once "../src/controller/canviarcontrasenya.php";
require_once "../src/controller/docanvicontrasenya.php";
require_once "../src/controller/docanviarimatge.php";
require_once "../src/controller/registreadmin.php";
require_once "../src/controller/article.php";
require_once "../src/controller/contacte.php";
require_once "../src/controller/admin.php";
require_once "../src/controller/article.php";
require_once "../src/controller/llistarusuari.php";
require_once "../src/controller/llistararticle.php";
require_once "../src/controller/llistarcategoria.php";
require_once "../src/controller/crearcategoria.php";
require_once "../src/controller/creararticle.php";
require_once "../src/controller/docreararticle.php";
require_once "../src/controller/actualitzararticle.php";
require_once "../src/controller/actualitzarusuari.php";
require_once "../src/controller/doactualitzararticle.php";
require_once "../src/controller/doactualitzarusuari.php";
require_once "../src/controller/esborrarusuari.php";
require_once "../src/controller/esborrararticle.php";
require_once "../src/controller/esborrarcategoria.php";
require_once "../src/controller/actualitzacategoria.php";
require_once "../src/controller/doactualitzacategoria.php";
require_once "../src/controller/historialCategories.php";
require_once "../src/controller/historialArticles.php";
require_once "../src/controller/historialCategoriaConcreta.php";
require_once "../src/controller/historialArticleConcret.php";
require_once "../src/controller/articlespreferitsusuari.php";
require_once "../src/controller/llistarmissatges.php";
require_once "../src/controller/esborrarmissatge.php";
require_once "../src/controller/mostrarArticles.php";
require_once "../src/controller/mostrarTramits.php";
/*Afegim els middleware necessaris*/
require_once "../src/middleware/middleCentral.php";
require_once "../src/middleware/middleLogat.php";
require_once "../src/middleware/middleAdmin.php";
require_once "../src/middleware/middleGestor.php";

$contenidor = new \Emeset\Contenidor($config);
$app = new \Emeset\Emeset($contenidor);

/*Access a la Portada*/
$app->ruta("", "ctrlPortada", ["middleCentral"]);
$app->ruta("perfilusuari", "ctrlPerfilUsuari", ["middleCentral"]);
$app->ruta("article", "ctrlArticle", ["middleCentral"]);
$app->ruta("mostrarArticles", "ctrlMostrarArticles", ["middleCentral"]);
$app->ruta("mostrarTramits", "ctrlMostrarTramits", ["middleCentral"]);
$app->ruta("contacte", "ctrlContacte", ["middleCentral"]);
$app->ruta("article", "ctrlArticle", ["middleCentral"]);
$app->ruta("articlespreferitsusuari", "ctrlArticlespreferitsusuari", ["middleCentral", "middleLogat"]);

/*Iniciar i Tancar la Sessió a la aplicació*/
$app->ruta("login", "ctrlLogin", ["middleCentral"]);
$app->ruta("dologin", "ctrlDoLogin", ["middleCentral"]);
$app->ruta("registre", "ctrlRegistre", ["middleCentral"]);
$app->ruta("canviarcontrasenya", "ctrlCanviarContrasenya", ["middleCentral"]);
$app->ruta("docanvicontrasenya", "ctrlDoCanviarContrasenya", ["middleCentral"]);
$app->ruta("docanviarimatge", "ctrlDoCanviarImatge", ["middleCentral"]);
$app->ruta("doregistre", "ctrlDoRegistre", ["middleCentral"]);
$app->ruta("logout", "ctrlLogout", ["middleCentral", "middleLogat"]);
/*Access al Panell d'Administració*/
$app->ruta("admin", "ctrlAdmin", ["middleCentral", "middleLogat", "middleGestor"]);
$app->ruta("llistarcategoria", "ctrlLlistarcategoria", ["middleCentral", "middleLogat", "middleGestor"]);
$app->ruta("crearcategoria", "ctrlCrearCategoria", ["middleCentral", "middleLogat", "middleGestor"]);
$app->ruta("creararticle", "ctrlCrearArticle", ["middleCentral", "middleLogat", "middleGestor"]);
$app->ruta("docrearcategoria", "ctrlDoCrearCategoria", ["middleCentral", "middleLogat", "middleGestor"]);
$app->ruta("esborrarcategoria", "ctrlEsborrarcategoria", ["middleCentral", "middleLogat", "middleGestor"]);
$app->ruta("llistararticle", "ctrlLlistararticle", ["middleCentral", "middleLogat", "middleGestor"]);
$app->ruta("creararticle", "ctrlCrearArticle", ["middleCentral", "middleLogat", "middleGestor"]);
$app->ruta("docreararticle", "ctrlDocreararticle", ["middleCentral", "middleLogat", "middleGestor"]);
$app->ruta("esborrararticle", "ctrlEsborrararticle", ["middleCentral", "middleLogat", "middleGestor"]);
$app->ruta("actualitzararticle", "ctrlActualitzararticle", ["middleCentral", "middleLogat", "middleGestor"]);
$app->ruta("actualitzarusuari", "ctrlActualitzarusuari", ["middleCentral", "middleLogat", "middleGestor"]);
$app->ruta("doactualitzararticle", "ctrlDoActualitzarArticle", ["middleCentral", "middleLogat", "middleGestor"]);
$app->ruta("doactualitzarusuari", "ctrlDoActualitzarUsuari", ["middleCentral", "middleLogat", "middleGestor"]);
$app->ruta("llistarusuari", "ctrlLlistarusuari", ["middleCentral", "middleLogat", "middleAdmin"]);
$app->ruta("doactualitzarusuari", "ctrlDoactualitzarusuari", ["middleCentral", "middleLogat", "middleGestor"]);
$app->ruta("actualitzarusuari", "ctrlActualitzarusuari", ["middleCentral", "middleLogat", "middleAdmin"]);
$app->ruta("registreadmin", "ctrlRegistreAdmin", ["middleCentral", "middleLogat", "middleAdmin"]);
$app->ruta("doregistreadmin", "ctrlDoRegistreAdmin", ["middleCentral", "middleLogat", "middleAdmin"]);
$app->ruta("esborrarusuari", "ctrlEsborrarusuari", ["middleCentral", "middleLogat", "middleAdmin"]);
$app->ruta("actualitzacategoria", "ctrlActualitzacategoria", ["middleCentral", "middleLogat", "middleGestor"]);
$app->ruta("doactualitzacategoria", "ctrlDoactualitzacategoria", ["middleCentral", "middleLogat", "middleGestor"]);
$app->ruta("historialCategories", "ctrlHistorialCategories", ["middleCentral", "middleLogat", "middleAdmin"]);
$app->ruta("historialArticles", "ctrlHistorialArticles", ["middleCentral", "middleLogat", "middleAdmin"]);
$app->ruta("historialCategoriaConcreta", "ctrlHistorialCategoriaConcreta", ["middleCentral", "middleLogat", "middleAdmin"]);
$app->ruta("historialArticleConcret", "ctrlHistorialArticleConcret", ["middleCentral", "middleLogat", "middleAdmin"]);
$app->ruta("llistarmissatges", "ctrlLlistarmissatges", ["middleCentral", "middleLogat", "middleGestor"]);
$app->ruta("esborrarmissatge", "ctrlEsborrarmissatge", ["middleCentral", "middleLogat", "middleGestor"]);
/*Controladors Ajax*/
$app->ruta("countUsuaris", "ctrlCountUsuaris", ["middleCentral", "middleLogat", "middleGestor"]);
$app->ruta("countArticles", "ctrlCountArticles", ["middleCentral", "middleLogat", "middleGestor"]);
$app->ruta("countCategories", "ctrlCountCategories", ["middleCentral", "middleLogat", "middleGestor"]);
$app->ruta("countContacte", "ctrlCountContacte", ["middleCentral", "middleLogat", "middleGestor"]);
$app->ruta("canviTempsRefresc", "ctrlCanviTempsRefresc", ["middleCentral", "middleLogat", "middleGestor"]);
$app->ruta("docontacte", "ctrlDoContacte", ["middleCentral"]);
$app->ruta("afegirFavorits", "ctrlAfegirFavorits", ["middleCentral", "middleLogat"]);
$app->ruta("esborrarFavorits", "ctrlEsborrarFavorits", ["middleCentral", "middleLogat"]);
$app->ruta("consultarFavorits", "ctrlConsultarFavorits", ["middleCentral", "middleLogat"]);

$app->executa();