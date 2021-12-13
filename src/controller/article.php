<?php

function ctrlArticle($peticio, $resposta, $contenidor)
{
    $articlesPDO = $contenidor->articlesPDO();

    $idarticle = $peticio->get("INPUT_REQUEST", "id");

    $informacioArticle = $articlesPDO->getInfoArticle($idarticle);

    $count = $articlesPDO->gettotalregistres();

    $idAnterior = $idarticle - 1;
    $idSeguent = $idarticle + 1;

    $resposta->set('count', $count);
    $resposta->set('idAnterior', $idAnterior);
    $resposta->set('idSeguent', $idSeguent);
    $resposta->set('informacioArticle', $informacioArticle);

    $resposta->SetTemplate("article.php");

    return $resposta;
}