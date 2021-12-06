<?php

function ctrlPortada($peticio, $resposta, $contenidor)
{
    $articlesPDO = $contenidor->articlesPDO();

    $articlesPortada = $articlesPDO->getllistatPortada(5);

    $resposta->set("articlesPortada", $articlesPortada);

    $resposta->SetTemplate("portada.php");
    
    return $resposta;
}