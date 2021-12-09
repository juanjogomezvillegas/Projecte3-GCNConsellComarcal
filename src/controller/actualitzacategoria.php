<?php

function ctrlActualitzacategoria($peticio, $resposta, $contenidor)
{
    $categoriesPDO = $contenidor->categoriesPDO();

    $idarticle = $peticio->get("INPUT_REQUEST", "id");

    $dadescategoria = $categoriesPDO->get($idarticle);

    $resposta->set('dadescategoria', $dadescategoria);

    $resposta->SetTemplate("actualitzacategoria.php");

    return $resposta;
}