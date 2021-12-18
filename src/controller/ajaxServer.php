<?php

function ctrlCountUsuaris($peticio, $resposta, $contenidor)
{
    $usuarisPDO = $contenidor->usuarisPDO();

    $totalusers = $usuarisPDO->gettotalregistres();

    echo $totalusers["total"];

    return $resposta;
}

function ctrlCountArticles($peticio, $resposta, $contenidor)
{
    $articlesPDO = $contenidor->articlesPDO();

    $totalarticle = $articlesPDO->gettotalregistres();

    echo $totalarticle["total"];

    return $resposta;
}

function ctrlCountCategories($peticio, $resposta, $contenidor)
{
    $categoriesPDO = $contenidor->categoriesPDO();

    $totalcategories = $categoriesPDO->gettotalregistres();

    echo $totalcategories["total"];

    return $resposta;
}

function ctrlCountContacte($peticio, $resposta, $contenidor)
{
    $contactePDO = $contenidor->contactePDO();

    $totalcontactes = $contactePDO->gettotalregistres();

    echo $totalcontactes["total"];

    return $resposta;
}

function ctrlCanviTempsRefresc($peticio, $resposta, $contenidor)
{
    $tempsresfresc2 = $peticio->get(INPUT_POST, "tempsresfresc");

    $tempsresfresc = filter_var($tempsresfresc2, FILTER_SANITIZE_NUMBER_INT);

    $tempsresfresc = $tempsresfresc / 1000;

    $resposta->setCookie("tempsresfresc", $tempsresfresc, strtotime("+1 month"));

    return $resposta;
}