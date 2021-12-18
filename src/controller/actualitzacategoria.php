<?php

function ctrlActualitzacategoria($peticio, $resposta, $contenidor)
{
    $categoriesPDO = $contenidor->categoriesPDO();

    $idarticle2 = $peticio->get("INPUT_REQUEST", "id");

    $idarticle = filter_var($idarticle2, FILTER_SANITIZE_NUMBER_INT);

    $dadescategoria = $categoriesPDO->get($idarticle);

    $resposta->set('dadescategoria', $dadescategoria);

    $resposta->SetTemplate("actualitzacategoria.php");

    return $resposta;
}