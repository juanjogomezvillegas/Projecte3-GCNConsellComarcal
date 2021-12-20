<?php

function ctrlDoContacte($peticio, $resposta, $contenidor)
{
    $usuarisPDO = $contenidor->usuarisPDO();
    $contactePDO = $contenidor->contactePDO();

    $usuarilogat2 = $peticio->get(INPUT_COOKIE, "usuarilogat");
    $nom2 = $peticio->get(INPUT_POST, "nom");
    $email2 = $peticio->get(INPUT_POST, "email");
    $telefon2 = $peticio->get(INPUT_POST, "telefon");
    $missatge2 = $peticio->get(INPUT_POST, "missatge");
    $recaptcha_response = $peticio->get(INPUT_POST, 'recaptcha_response');

    $usuarilogat = trim(filter_var($usuarilogat2, FILTER_SANITIZE_STRING));
    $nom = trim(filter_var($nom2, FILTER_SANITIZE_STRING));
    $email = trim(filter_var($email2, FILTER_SANITIZE_STRING, FILTER_SANITIZE_EMAIL, FILTER_VALIDATE_EMAIL));
    $telefon = trim(filter_var($telefon2, FILTER_SANITIZE_STRING));
    $missatge = trim(filter_var($missatge2, FILTER_SANITIZE_STRING));

    $recaptcha = $contactePDO->validacionRecaptcha($recaptcha_response);

    if ($recaptcha->score >= 0.7) {
        $dadesUsuari = $usuarisPDO->get($usuarilogat);

        $contactePDO->add($nom, $email, $telefon, $missatge, $dadesUsuari["id"]);

        $resposta->SetTemplate("contacte.php");
    } else {
        $resposta->redirect("Location:index.php?r=contacte&error=1");
    }

    return $resposta;
}
