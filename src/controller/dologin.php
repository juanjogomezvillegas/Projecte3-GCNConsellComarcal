<?php

function ctrlDoLogin($peticio, $resposta, $contenidor)
{
    $usuarisPDO = $contenidor->usuarisPDO();

    $usuarilogat = $peticio->get(INPUT_POST, "inputusuari");
    $passwordlogat = $peticio->get(INPUT_POST, "inputpassword");

    $error = false;
    if (empty($usuarilogat)) {
        $error = true;
    } else {
        $resposta->setCookie("usuarilogat", $usuarilogat, strtotime("+1 month"));
    }

    if (empty($passwordlogat)) {
        $error = true;
    }

    $logat = $usuarisPDO->islogin($usuarilogat, $passwordlogat);
    if ($logat) {
        $error = false;
    } else {
        $error = true;
    }

    $resposta->setSession("logat", $logat);

    $dadesUsuari = $usuarisPDO->get($usuarilogat);

    if (!$error) {
        if ($dadesUsuari["rol"] === "Administrador") {
            $resposta->redirect("Location:index.php?r=admin");
        } else {
            $resposta->redirect("Location:index.php");
        }
    } else {
        $resposta->setSession("missatgeError", "Error: Usuari o Contrasenya Incorrectes !!!");
        $resposta->redirect("Location:index.php?r=login");
    }

    return $resposta;
}