<?php

function ctrlArticle($peticio, $resposta, $contenidor)
{
    $idarticle = $peticio->get(INPUT_GET, "id");

    $articlesPDO = $contenidor->articlesPDO();

    $informacioArticle = $articlesPDO-> show($idarticle);
    
    $seguentArticle = $articlesPDO-> obtenirSeguentArticle($idarticle);

    $idseguentArticle = $seguentArticle['id'];

    $nomseguentArticle = $seguentArticle['titol'];

    $anteriorArticle = $articlesPDO-> obtenirAnteriorArticle($idarticle);

    $idanteriorArticle = $anteriorArticle['id'];

    $nomanteriorArticle = $anteriorArticle['titol'];
    
    $resposta->set('idseguentArticle', $idseguentArticle);

    $resposta->set('nomseguentArticle', $nomseguentArticle);

    $resposta->set('idanteriorArticle', $idanteriorArticle);
    
    $resposta->set('nomanteriorArticle', $nomanteriorArticle);

    $resposta->set('informacioArticle', $informacioArticle);

    $resposta->SetTemplate("article.php");

    return $resposta;
}