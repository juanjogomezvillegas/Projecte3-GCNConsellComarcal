<?php

function ctrlDoactualitzarusuari($peticio, $resposta, $contenidor)
{
    $usuarisPDO = $contenidor->UsuarisPDO();

    $id2 = $peticio->get(INPUT_POST, "id");
    $usuari2 = $peticio->get(INPUT_POST, "username");
    $tipususuari2 = $peticio->get(INPUT_POST, "rol");
    $nom2 = $peticio->get(INPUT_POST, "nom");
    $cognom2 = $peticio->get(INPUT_POST, "cognom");
    $email2 = $peticio->get(INPUT_POST, "email");
    $telefon2 = $peticio->get(INPUT_POST, "telefon");

    $id = trim(filter_var($id2, FILTER_SANITIZE_STRING));
    $usuari = trim(filter_var($usuari2, FILTER_SANITIZE_STRING));
    $tipususuari = trim(filter_var($tipususuari2, FILTER_SANITIZE_STRING));
    $nom = trim(filter_var($nom2, FILTER_SANITIZE_STRING));
    $cognom = trim(filter_var($cognom2, FILTER_SANITIZE_STRING));
    $email = trim(filter_var($email2, FILTER_SANITIZE_STRING, FILTER_SANITIZE_EMAIL, FILTER_VALIDATE_EMAIL));
    $telefon = trim(filter_var($telefon2, FILTER_SANITIZE_STRING));

    $verificar = $usuarisPDO -> update($id, $nom, $cognom, $usuari, $tipususuari, $email, $telefon);

    if ($verificar) {
        $update = true;
    } else {
        $update = false;
    }

    $dadesusuari = $usuarisPDO->get($id);

    $resposta->set('dadesusuari', $dadesusuari);

    if ($update == true) {
        $resposta->redirect("Location:index.php?r=actualitzarusuari&id=$usuari");
    } else {
        $resposta->redirect("Location:index.php?r=actualitzarusuari&id=$usuari&update=1");
    }
    return $resposta;
}
