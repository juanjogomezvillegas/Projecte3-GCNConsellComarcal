<?php

function ctrlDoComentari($peticio, $resposta, $contenidor)
{
    $usuarisPDO = $contenidor->usuarisPDO();
    $contactePDO = $contenidor->contactePDO();
    $comentarisPDO = $contenidor->comentarisPDO();

    $usuarilogat2 = $peticio->get(INPUT_COOKIE, "usuarilogat");
    $idarticle2 = $peticio->get(INPUT_POST, "idarticle");
    $missatge2 = $peticio->get(INPUT_POST, "missatge");
    $recaptcha_response = $peticio->get(INPUT_POST, 'recaptcha_response');

    $usuarilogat = trim(filter_var($usuarilogat2, FILTER_SANITIZE_STRING));
    $idarticle = trim(filter_var($idarticle2, FILTER_SANITIZE_NUMBER_INT));
    $missatge = trim(filter_var($missatge2, FILTER_SANITIZE_STRING));

    $recaptcha = $contactePDO->validacionRecaptcha($recaptcha_response);

    if ($recaptcha->score >= 0.7) {
        $dadesUsuari = $usuarisPDO->get($usuarilogat);

        $comentarisPDO->add($missatge, $idarticle, $dadesUsuari["id"]);

        $resposta->redirect("Location:index.php?r=article&id=$idarticle");
    } else {
        $resposta->redirect("Location:index.php?r=article&id=$idarticle&error=1");
    }

    return $resposta;
}
