<?php
/*Inclou el fitxer config.php*/
include "../src/config.php";

/*Prepara les dades necessaries per connectar-se a la base de dades*/
$connexio;
$dsn = "mysql:dbname={$config['dbname']};host={$config['host']}";
$usuari = $config['user'];
$password = $config['pass'];

/*Mostra informació del que està passant a l'usuari*/
echo "...Creant la Base de Dades {$config['dbname']} \n";

/*Es connecta a la base de dades fent servir les dades anteriors*/
try {
    $connexio = new \PDO($dsn, $usuari, $password);
} catch (\PDOException $e) {
    die("Ha fallat la connexió: " . $e->getMessage() . " $usuari");
}

/*Mostra informació del que està passant a l'usuari*/
echo "......Creant les Taules \n";

/*Inclou el fitxer taules.php*/
include "./bd/taules.php";

/*Mostra informació del que està passant a l'usuari*/
echo "......Afegint Dades a les Taules \n";

/*Inclou el fitxer dades.php*/
include "./bd/dades.php";

/*Mostra informació del que està passant a l'usuari*/
echo "...La Base de Dades {$config['dbname']} s'ha creat correctament\n";