<?php

function ctrlDoCrearArticle($peticio, $resposta, $contenidor)
{
    $articlesPDO = $contenidor->articlesPDO();

    $usuarilogat = $peticio->get(INPUT_COOKIE, "usuarilogat");
    $nomIntroduit = $peticio->get(INPUT_POST, "nom");

    $error = false;
    if (empty($nomIntroduit)) {
        $error = true;
    }else{
        $registre = $articlesPDO->add($nomIntroduit, $usuarilogat);
    }
    if ($registre) {
        $error = false;
    } else {
        $error = true;
    }
    if ($error) {
        $resposta->redirect("Location:index.php?r=llistarcategoria");
    } else {
        $resposta->setSession("missatgeError", "Error: La categoria no s'ha pogut crear!!!");
        $resposta->redirect("Location:index.php?r=crearcategoria");
    }
    return $resposta;
}