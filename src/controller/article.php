<?php

function ctrlArticle($peticio, $resposta, $contenidor)
{
    $idarticle = $peticio->get(INPUT_GET, "id");

    $articlesPDO = $contenidor->articlesPDO();

    $informacioArticle = $articlesPDO-> show($idarticle);

    $resposta->set('informacioArticle', $informacioArticle);

    $resposta->SetTemplate("article.php");

    return $resposta;
}