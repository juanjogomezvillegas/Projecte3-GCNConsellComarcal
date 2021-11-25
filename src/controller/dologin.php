<?php

function ctrlDoLogin($peticio, $resposta, $contenidor)
{
    $usuarisPDO = $contenidor->usuarisPDO();

    $usuarilogat = $peticio->get(INPUT_POST, "inputusuari");
    $passwordlogat = $peticio->get(INPUT_POST, "inputpassword");

    $error = false;
    if ($usuarilogat == "" || $passwordlogat == "") {
        $error = true;
    } else {
        $resposta->setCookie("usuarilogat", $usuarilogat, "+1 month");
    }

    $logat = $usuarisPDO->islogin();
    if ($logat) {
        $error = false;
    } else {
        $error = true;
    }

    $resposta->setSession("logat", $logat);

    if (!$error) {
        $resposta->redirect("Location:index.php");
    } else {
        $resposta->setSession("missatgeError", "Error: Usuari o Contrasenya Incorrectes !!!");
        $resposta->redirect("Location:index.php?r=login");
    }

    return $resposta;
}