<?php

function ctrlArticle($peticio, $resposta, $contenidor)
{
    $idarticle = $peticio->get("INPUT_REQUEST", "id");

    $articlesPDO = $contenidor->articlesPDO();

    $informacioArticle = $articlesPDO->getInfoArticle($idarticle);

    $resposta->set('informacioArticle', $informacioArticle);

    $resposta->SetTemplate("article.php");

    return $resposta;
}