<?php

function ctrlEsborrararticle($peticio, $resposta, $contenidor)
{
    $articlesPDO = $contenidor->articlesPDO();

    $idarticle = $peticio->get(INPUT_GET, "id");  
    
    $articlesPDO->delete($idarticle);

    $resposta->redirect("Location:index.php?r=llistararticle");

    return $resposta;
}