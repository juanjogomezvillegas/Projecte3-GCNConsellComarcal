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