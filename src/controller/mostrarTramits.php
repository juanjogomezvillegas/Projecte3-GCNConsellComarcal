<?php

function ctrlMostrarTramits($peticio, $resposta, $contenidor)
{
    $articlesPDO = $contenidor->articlesPDO();
    
    $articlesPortadaTramits = $articlesPDO->getllistatPortadaTramits(0);

    $resposta->set("articlesPortadaTramits", $articlesPortadaTramits);

    $resposta->SetTemplate("mostrarTramits.php");
    return $resposta;
}