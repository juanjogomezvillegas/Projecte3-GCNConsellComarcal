<?php

function ctrlDoCrearArticle($peticio, $resposta, $contenidor)
{
    $articlesPDO = $contenidor->articlesPDO();

    $usuarilogat = $peticio->get(INPUT_COOKIE, "usuarilogat");

    $titol = $peticio->get(INPUT_POST, "titol");
    $contingut = $peticio->get(INPUT_POST, "contingut");
    $publicat = $peticio->get(INPUT_POST, "publicat");
    $categoria = $peticio->get(INPUT_POST, "categoria");

    $numPublicat;
    if ($publicat == "on") {
        $numPublicat = 1;
    } else {
        $numPublicat = 0;
    }

    $error = false;
    if (empty($titol)) {
        $error = true;
    } else{
        $registre = $articlesPDO->add($titol, $contingut, $numPublicat, $categoria, $usuarilogat);
    }
    if ($registre) {
        $error = false;
    } else {
        $error = true;
    }
    if ($error) {
        $resposta->redirect("Location:index.php?r=llistararticle");
    } else {
        $resposta->setSession("missatgeError", "Error: L'article no s'ha pogut crear!!!");
        $resposta->redirect("Location:index.php?r=creararticle");

    }
    return $resposta;
}