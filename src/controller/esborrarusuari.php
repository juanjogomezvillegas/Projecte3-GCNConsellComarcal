<?php

function ctrlEsborrarusuari($peticio, $resposta, $contenidor)
{
    $usuarisPDO = $contenidor->usuarisPDO();

    $idusuari = $peticio->get(INPUT_GET, "id");  
    
    $usuarisPDO->delete($idusuari);

    $resposta->redirect("Location:index.php?r=llistarusuari");

    return $resposta;
}