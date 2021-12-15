<?php

function ctrlDoCrearArticle($peticio, $resposta, $contenidor)
{
    $articlesPDO = $contenidor->articlesPDO();

    $usuarilogat = $peticio->get(INPUT_COOKIE, "usuarilogat");

    $titol = $peticio->get(INPUT_POST, "titol");
    $contingut = $peticio->getRaw(INPUT_POST, "contingut");
    $publicat = $peticio->get(INPUT_POST, "publicat");
    $categoria = $peticio->get(INPUT_POST, "categoria");
    $imatgearticle = $peticio->get("FILES", "imatgearticle");

    $numPublicat = 0;

    if ($publicat == "on") {
        $numPublicat = 1;
    } else {
        $numPublicat = 0;
    }

    $idarticle = 0;
    $error = false;
    if (empty($titol)) {
        $error = true;
    } else{
        $idarticle = $articlesPDO->add($titol, $contingut, $numPublicat, $categoria, $usuarilogat);

        if (isset($imatgearticle) && ($imatgearticle["type"] === "image/png" || $imatgearticle["type"] === "image/jpg")) {
            $articlesPDO->updateImage($idarticle, $imatgearticle["name"]);

            move_uploaded_file($imatgearticle["tmp_name"], "img/articles/".$imatgearticle["name"]);
        }
    }
    if (isset($idarticle)) {
        $error = false;
    } else {
        $error = true;
    }
    if (!$error) {
        $resposta->redirect("Location:index.php?r=llistararticle");
    } else {
        $resposta->setSession("missatgeError", "Error: L'article no s'ha pogut crear!!!");
        $resposta->redirect("Location:index.php?r=creararticle");

    }
    return $resposta;
}