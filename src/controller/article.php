<?php

function ctrlArticle($peticio, $resposta, $contenidor)
{
    $articlesPDO = $contenidor->articlesPDO();

    $idarticle = $peticio->get("INPUT_REQUEST", "id");

    $informacioArticle = $articlesPDO->getInfoArticle($idarticle);

    $maxmin = $articlesPDO->getMaxMin();

    $resposta->set('maxmin', $maxmin);
    $resposta->set('informacioArticle', $informacioArticle);

    $resposta->SetTemplate("article.php");

    return $resposta;
}