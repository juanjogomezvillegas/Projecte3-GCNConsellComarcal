<?php

$config = array();

/*Configuració de les dades per fer la connexió a la base de dades*/
$config["user"] = "gcnaltemporda_cat";
$config["pass"] = "1234";
$config["dbname"] = "gcnaltemporda_cat";
$config["host"] = "localhost";

require_once "../src/emeset/contenidor.php";
require_once "../src/emeset/emeset.php";
require_once "../src/emeset/Middleware.php";
require_once "../src/emeset/http/peticio.php";
require_once "../src/emeset/http/resposta.php";
require_once "../src/emeset/ruter/RuterParam.php";

require_once "../src/models/connexio.php";
require_once "../src/models/modelPDO.php";