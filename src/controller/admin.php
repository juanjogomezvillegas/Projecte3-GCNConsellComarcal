<?php

function ctrlAdmin($peticio, $resposta, $contenidor)
{
    $articlesPDO = $contenidor->articlesPDO();
    $usuarisPDO = $contenidor->usuarisPDO();
    $categoriesPDO = $contenidor->categoriesPDO();
    $contactePDO = $contenidor->contactePDO();

    $tempsresfresc2 = $peticio->get(INPUT_COOKIE, "tempsresfresc");

    $tempsresfresc = filter_var($tempsresfresc2, FILTER_SANITIZE_NUMBER_INT);

    $totalarticle = $articlesPDO->gettotalregistres();

    $totalusers = $usuarisPDO->gettotalregistres();

    $totalcategories = $categoriesPDO->gettotalregistres();

    $totalcontactes = $contactePDO->gettotalregistres();

    if (!isset($tempsresfresc)) {
        $tempsresfresc = 10;
    }

    $resposta->set('tempsresfresc', $tempsresfresc);
    $resposta->set('totalarticle', $totalarticle);
    $resposta->set('totalusers', $totalusers);
    $resposta->set('totalcategories', $totalcategories);
    $resposta->set('totalcontactes', $totalcontactes);


    $resposta->SetTemplate("admin.php");

    return $resposta;
}
