<?php

function ctrlDoRegistre($peticio, $resposta, $contenidor)
{
    $usuarisPDO = $contenidor->usuarisPDO();

    $usuarnameIntroduit2 = $peticio->get(INPUT_POST, "username");
    $passwordIntroduit2 = $peticio->get(INPUT_POST, "password");
    $passwordConfirmar2 = $peticio->get(INPUT_POST, "confirm_password");
    $nomIntroduit2 = $peticio->get(INPUT_POST, "nom");
    $cognomIntroduit2 = $peticio->get(INPUT_POST, "cognom");
    $emailIntroduit2 = $peticio->get(INPUT_POST, "email");
    $telefonIntroduit2 = $peticio->get(INPUT_POST, "telefon");
    $rolIntroduit2 = $peticio->get(INPUT_POST, "rol");

    $usuarnameIntroduit = trim(filter_var($usuarnameIntroduit2, FILTER_SANITIZE_STRING));
    $passwordIntroduit = trim(filter_var($passwordIntroduit2, FILTER_SANITIZE_STRING));
    $passwordConfirmar = trim(filter_var($passwordConfirmar2, FILTER_SANITIZE_STRING));
    $nomIntroduit = trim(filter_var($nomIntroduit2, FILTER_SANITIZE_STRING));
    $cognomIntroduit = trim(filter_var($cognomIntroduit2, FILTER_SANITIZE_STRING));
    $emailIntroduit = trim(filter_var($emailIntroduit2, FILTER_SANITIZE_STRING, FILTER_SANITIZE_EMAIL, FILTER_VALIDATE_EMAIL));
    $telefonIntroduit = trim(filter_var($telefonIntroduit2, FILTER_SANITIZE_STRING));
    $rolIntroduit = trim(filter_var($rolIntroduit2, FILTER_SANITIZE_STRING));

    $error = false;
    if (empty($usuarnameIntroduit) && empty($passwordIntroduit) && empty($nomIntroduit) && empty($cognomIntroduit) && empty($telefonIntroduit) && empty($emailIntroduit)) {
        $error = true;
    } elseif ($passwordIntroduit != $passwordConfirmar) {
        $error = true;
    } else {
        $passwordIntroduit = $usuarisPDO -> crearPasswordEncriptat($passwordIntroduit);

        $registre = $usuarisPDO->add($nomIntroduit, $cognomIntroduit, $usuarnameIntroduit, $passwordIntroduit, $rolIntroduit, $emailIntroduit, $telefonIntroduit);
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
