<?php

function ctrlactualitzararticle($peticio, $resposta, $contenidor)
{
    $articlesPDO = $contenidor->articlesPDO();

    $categoriesPDO = $contenidor->categoriesPDO();

    $dadescategoria = $categoriesPDO->getllistat();

    $idarticle = $peticio->get(INPUT_GET, "id");

    $article = $articlesPDO->show($idarticle);

    $resposta->set('article', $article);

    $resposta->set('dadescategoria', $dadescategoria);

    $resposta->SetTemplate("actualitzararticle.php");

    //$resposta->redirect("Location:index.php?r=actualitzararticle&id=$idarticle");

    return $resposta;
}