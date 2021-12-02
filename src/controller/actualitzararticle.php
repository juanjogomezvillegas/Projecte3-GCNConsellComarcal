<?php

function ctrlactualitzararticle($peticio, $resposta, $contenidor)
{
    $articlesPDO = $contenidor->articlesPDO();

    $idarticle = $peticio->get(INPUT_GET, "id");

    $article = $articlesPDO->show($idarticle);

    $resposta->set('article', $article);

    $resposta->SetTemplate("actualitzararticle.php");

    //$resposta->redirect("Location:index.php?r=actualitzarcampsarticle&id=$idarticle");

    return $resposta;
}