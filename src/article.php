<?php

function ctrlArticle($peticio, $resposta, $contenidor)
{
    $articlesPDO = $contenidor->articlesPDO();

    $articlesPortada = $articlesPDO->getllistatPortada(5);

    $resposta->set("articlesPortada", $articlesPortada);

    $resposta->SetTemplate("article.php");
    
    return $resposta;
}