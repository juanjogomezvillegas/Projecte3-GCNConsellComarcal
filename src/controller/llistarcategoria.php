<?php

function ctrlLlistarcategoria($peticio, $resposta, $contenidor)
{
    $categoriesPDO = $contenidor->categoriesPDO();

    $dadescategoria = $categoriesPDO->getllistatPublic();

    $resposta->set('dadescategoria', $dadescategoria);

    $resposta->SetTemplate("llistarcategoria.php");

    return $resposta;
}