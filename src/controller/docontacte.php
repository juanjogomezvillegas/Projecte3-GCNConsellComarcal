<?php

function ctrlDoContacte($peticio, $resposta, $contenidor)
{
    $usuarisPDO = $contenidor->usuarisPDO();
    $contactePDO = $contenidor->contactePDO();

    $usuarilogat = $peticio->get(INPUT_COOKIE, "usuarilogat");
    $nom = $peticio->get(INPUT_POST, "nom");
    $email = $peticio->get(INPUT_POST, "email");
    $telefon = $peticio->get(INPUT_POST, "telefon");
    $missatge = $peticio->get(INPUT_POST, "missatge");
    $recaptcha_response = $peticio->get(INPUT_POST, 'recaptcha_response');

    $recaptcha = $contactePDO -> validacionRecaptcha($recaptcha_response);

    if ($recaptcha->score >= 0.0) {

        $dadesUsuari = $usuarisPDO->get($usuarilogat);

        $contactePDO->add($nom,$email,$telefon,$missatge,$dadesUsuari["id"]);

        $resposta->SetTemplate("contacte.php");
    } else{
        $resposta->redirect("Location:index.php?r=contacte&error=1");
    }

    

    return $resposta;
}