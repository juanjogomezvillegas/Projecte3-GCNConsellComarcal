<?php

function ctrlDoRegistre($peticio, $resposta, $contenidor)
{
    $usuarisPDO = $contenidor->usuarisPDO();

    $usuarnameIntroduit = $peticio->get(INPUT_POST, "username");
    $passwordIntroduit = $peticio->get(INPUT_POST, "password");
    $passwordConfirmar = $peticio->get(INPUT_POST, "confirm_password");
    $nomIntroduit = $peticio->get(INPUT_POST, "nom");
    $cognomIntroduit = $peticio->get(INPUT_POST, "cognom");
    $emailIntroduit = $peticio->get(INPUT_POST, "email");
    $telefonIntroduit = $peticio->get(INPUT_POST, "telefon");
    $rolIntroduit = $peticio->get(INPUT_POST, "rol");

    $error = false;
    if (empty($usuarnameIntroduit) && empty($passwordIntroduit) && empty($nomIntroduit) && empty($cognomIntroduit) && empty($telefonIntroduit) && empty($emailIntroduit)) {
        $error = true;
    }else if($passwordIntroduit != $passwordConfirmar){
        $error = true;
    }else{
        $registre = $usuarisPDO->add($nomIntroduit,$cognomIntroduit,$usuarnameIntroduit,$passwordIntroduit,$rolIntroduit,$emailIntroduit,$telefonIntroduit);
    }
    if ($registre) {
        $error = false;
    } else {
        $error = true;
    }
    if ($error) {
        $resposta->redirect("Location:index.php?r=login");
    } else {
        $resposta->setSession("missatgeError", "Error: El usuari no s'ha pogut crear!!!");
        $resposta->redirect("Location:index.php?r=registre");
    }
    return $resposta;
}