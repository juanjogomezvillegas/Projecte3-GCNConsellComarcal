<?php

function ctrlMostrarArticles($peticio, $resposta, $contenidor)
{
    $articlesPDO = $contenidor->articlesPDO();

    $articlesPortada = $articlesPDO->getllistatPortada(0);

    $resposta->set("articlesPortada", $articlesPortada);
    
    $resposta->SetTemplate("mostrarArticles.php");
    return $resposta;
}