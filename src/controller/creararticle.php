<?php

function ctrlCrearArticle($peticio, $resposta, $contenidor)
{
    $categoriesPDO = $contenidor->categoriesPDO();

    $dadescategoria = $categoriesPDO->getllistatPublic();

    $resposta->set('dadescategoria', $dadescategoria);

    $resposta->SetTemplate("creararticle.php");

    return $resposta;
}