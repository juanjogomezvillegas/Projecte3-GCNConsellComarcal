<?php
$dataCreacio = new DateTime();

/*Afageix dades per defecte a la taula "usuari" de la base de dades*/
$usuaris = $usuaris = [
    ["id" => 1,"nom" => "admin","cognom" => "admin","username" => "admin","contrasenya" => "1234", "rol" => "Administrador","mail" => "admin@altemporda.cat","telefon" => "111 111 111"],
    ["id" => 2,"nom" => "gestor","cognom" => "gestor","username" => "gestor","contrasenya" => "1234", "rol" => "Gestor","mail" => "gestor@altemporda.cat","telefon" => "222 222 222"],
    ["id" => 3,"nom" => "usuari","cognom" => "usuari","username" => "usuari","contrasenya" => "1234", "rol" => "Usuari","mail" => "usuari@altemporda.cat","telefon" => "333 333 333"],
];

foreach ($usuaris as $actual) {
    $sql = $connexio->prepare("INSERT INTO usuari VALUES (:id,:nom,:cognom,:username,:pass,:rol,:mail,:telefon)");
    $sql->execute([":id" => $actual["id"],":nom" => $actual["nom"],":cognom" => $actual["cognom"],":username" => $actual["username"],":pass" => $actual["contrasenya"],
    ":rol" => $actual["rol"], ":mail" => $actual["mail"],":telefon" => $actual["telefon"]]);
}

/*Afageix dades per defecte a la taula "categoria" de la base de dades*/
$categories = $categories = [
    ["id" => 1,"nom" => "Gestor de Contingut del Consell Comarcal","usuari" => 2,"dataCreacio" => $dataCreacio->format("Y/n/j H:i:s")]
];

foreach ($categories as $actual) {
    $sql = $connexio->prepare("INSERT INTO categoria VALUES (:id,:nom,:usuari,:dataCreacio)");
    $sql->execute([":id" => $actual["id"],":nom" => $actual["nom"],":usuari" => $actual["usuari"],":dataCreacio" => $actual["dataCreacio"]]);
}

/*Afageix dades per defecte a la taula "article" de la base de dades*/
$articles = $articles = [
    ["id" => 1,"titol" => "Com Registrar-se a la Web","contingut" => "Ves al Formulari de Registre","publicat" => 1,"usuari" => 2,"dataCreacio" => $dataCreacio->format("Y/n/j H:i:s")]
];

foreach ($articles as $actual) {
    $sql = $connexio->prepare("INSERT INTO article VALUES (:id, :titol, :contingut, :publicat, :usuari, :dataCreacio)");
    $sql->execute([":id" => $actual["id"],":titol" => $actual["titol"],":contingut" => $actual["contingut"],":publicat" => $actual["publicat"],":usuari" => $actual["usuari"],":dataCreacio" => $actual["dataCreacio"]]);
}