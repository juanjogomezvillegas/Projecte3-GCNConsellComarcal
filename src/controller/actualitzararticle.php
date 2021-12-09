<?php

function ctrlActualitzararticle($peticio, $resposta, $contenidor)
{
    $articlesPDO = $contenidor->articlesPDO();
    $categoriesPDO = $contenidor->categoriesPDO();

    $idarticle = $peticio->get("INPUT_REQUEST", "id");

    $dadescategoria = $categoriesPDO->getllistat();

    $article = $articlesPDO->show($idarticle);

    $resposta->set('article', $article);
    $resposta->set('dadescategoria', $dadescategoria);

    $resposta->SetTemplate("actualitzararticle.php");

    return $resposta;
}