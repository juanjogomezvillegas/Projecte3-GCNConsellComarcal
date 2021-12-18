<?php

function ctrlDoCrearCategoria($peticio, $resposta, $contenidor)
{
    $categoriesPDO = $contenidor->categoriesPDO();

    $usuarilogat2 = $peticio->get(INPUT_COOKIE, "usuarilogat");
    $nomIntroduit2 = $peticio->get(INPUT_POST, "nom");

    $usuarilogat = trim(filter_var($usuarilogat2, FILTER_SANITIZE_STRING));
    $nomIntroduit = trim(filter_var($nomIntroduit2, FILTER_SANITIZE_STRING));

    $error = false;
    if (empty($nomIntroduit)) {
        $error = true;
    }else{
        $registre = $categoriesPDO->add($nomIntroduit, $usuarilogat);
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