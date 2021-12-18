<?php

function ctrlActualitzararticle($peticio, $resposta, $contenidor)
{
    $articlesPDO = $contenidor->articlesPDO();
    $categoriesPDO = $contenidor->categoriesPDO();

    $idarticle2 = $peticio->get("INPUT_REQUEST", "id");

    $idarticle = filter_var($idarticle2, FILTER_SANITIZE_NUMBER_INT);

    $dadescategoria = $categoriesPDO->getllistat();

    $article = $articlesPDO->show($idarticle);

    $resposta->set('article', $article);
    $resposta->set('dadescategoria', $dadescategoria);

    $resposta->SetTemplate("actualitzararticle.php");

    return $resposta;
}