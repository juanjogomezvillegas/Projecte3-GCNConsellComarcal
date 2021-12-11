<?php

function ctrlDoContacte($peticio, $resposta, $contenidor)
{
    $contactePDO = $contenidor->contactePDO();

    $nom = $peticio->get(INPUT_POST, "nom");

    $email = $peticio->get(INPUT_POST, "email");

    $telefon = $peticio->get(INPUT_POST, "telefon");

    $missatge = $peticio->get(INPUT_POST, "missatge");

    $recaptcha_response = $peticio->get(INPUT_POST, 'recaptcha_response');

    $recaptcha = $contactePDO -> validacionRecaptcha($recaptcha_response);

    if ($recaptcha->score >= 0.7) {

        $contactePDO -> add($nom,$email,$telefon,$missatge);

        $resposta->SetTemplate("contacte.php");
    }
    else{
        $resposta->redirect("Location:index.php?r=contacte&error=1");
    }

    

    return $resposta;
}