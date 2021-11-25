<?php

function ctrlDoLogin($peticio, $resposta, $contenidor)
{
    $usuarilogat = $peticio->set(INPUT_POST, "inputusuari");
    $passwordlogat = $peticio->set(INPUT_POST, "inputpassword");

    $error = false;
    if ($usuarilogat == "" || $passwordlogat == "") {
        $error = true;
    } else {
        $resposta->setCookie("usuarilogat", $usuarilogat, "+1 month");
    }

    $logat = false;

    $resposta->redirect("Location:index.php?r=login");
    return $resposta;
}