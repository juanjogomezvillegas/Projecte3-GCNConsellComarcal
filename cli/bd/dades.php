<?php
$dataCreacio = new DateTime();

/*Afageix dades per defecte a la taula "usuari" de la base de dades*/
$usuaris = $usuaris = [
    ["id" => 1,"nom" => "admin","cognom" => "admin","username" => "admin","contrasenya" => '$2y$10$sPIbIjxZg9yx3KuebAipjuN/u4.0e.q9YETRhe6uRzHhvgtGTyoYS', "rol" => "Administrador","mail" => "admin@altemporda.cat","telefon" => "111 111 111","imatge" => "/img/users/userporfile.png"],
    ["id" => 2,"nom" => "gestor","cognom" => "gestor","username" => "gestor","contrasenya" => '$2y$10$sPIbIjxZg9yx3KuebAipjuN/u4.0e.q9YETRhe6uRzHhvgtGTyoYS', "rol" => "Gestor","mail" => "gestor@altemporda.cat","telefon" => "222 222 222","imatge" => "/img/users/userporfile.png"],
    ["id" => 3,"nom" => "usuari","cognom" => "usuari","username" => "usuari","contrasenya" => '$2y$10$sPIbIjxZg9yx3KuebAipjuN/u4.0e.q9YETRhe6uRzHhvgtGTyoYS', "rol" => "Usuari","mail" => "usuari@altemporda.cat","telefon" => "333 333 333","imatge" => "/img/users/userporfile.png"],
];

foreach ($usuaris as $actual) {
    $sql = $connexio->prepare("INSERT INTO usuari VALUES (:id,:nom,:cognom,:username,:pass,:rol,:mail,:telefon,:imatge)");
    $sql->execute([":id" => $actual["id"],":nom" => $actual["nom"],":cognom" => $actual["cognom"],":username" => $actual["username"],":pass" => $actual["contrasenya"],
    ":rol" => $actual["rol"], ":mail" => $actual["mail"],":telefon" => $actual["telefon"],":imatge" => $actual["imatge"]]);
}

/*Afageix dades per defecte a la taula "categoria" de la base de dades*/
$categories = $categories = [
    ["id" => 1,"nom" => "Tramits","usuari" => 2,"dataCreacio" => $dataCreacio->format("Y/n/j H:i:s")],
    ["id" => 2,"nom" => "Ambits","usuari" => 2,"dataCreacio" => $dataCreacio->format("Y/n/j H:i:s")],
    ["id" => 3,"nom" => "Salut","usuari" => 2,"dataCreacio" => $dataCreacio->format("Y/n/j H:i:s")],
    ["id" => 4,"nom" => "Ocupació","usuari" => 2,"dataCreacio" => $dataCreacio->format("Y/n/j H:i:s")],
    ["id" => 5,"nom" => "Formació","usuari" => 2,"dataCreacio" => $dataCreacio->format("Y/n/j H:i:s")],
    ["id" => 6,"nom" => "Cites Previes","usuari" => 2,"dataCreacio" => $dataCreacio->format("Y/n/j H:i:s")],
    ["id" => 7,"nom" => "Habitatge","usuari" => 2,"dataCreacio" => $dataCreacio->format("Y/n/j H:i:s")],
    ["id" => 8,"nom" => "Noves Tecnologies","usuari" => 2,"dataCreacio" => $dataCreacio->format("Y/n/j H:i:s")]
];

foreach ($categories as $actual) {
    $sql = $connexio->prepare("INSERT INTO categoria VALUES (:id,:nom,:usuari,:dataCreacio)");
    $sql->execute([":id" => $actual["id"],":nom" => $actual["nom"],":usuari" => $actual["usuari"],":dataCreacio" => $actual["dataCreacio"]]);
}

/*Afageix dades per defecte a la taula "contacte" de la base de dades*/
$contactes = $contactes = [
    ["id" => 1,"missatge" => "Nota Projecte 3: 0","usuari" => 2,"dataCreacio" => $dataCreacio->format("Y/n/j H:i:s")]
];

foreach ($contactes as $actual) {
    $sql = $connexio->prepare("INSERT INTO contacte VALUES (:id, :missatge, :usuari, :dataCreacio)");
    $sql->execute([":id" => $actual["id"],":missatge" => $actual["missatge"],":usuari" => $actual["usuari"],":dataCreacio" => $actual["dataCreacio"]]);
}
