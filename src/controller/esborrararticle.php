<?php

function ctrlEsborrararticle($peticio, $resposta, $contenidor)
{
    $articlesPDO = $contenidor->articlesPDO();

    $idarticle = $peticio->get(INPUT_GET, "id");  
    
    $articlesPDO->delete($idarticle);

    return $resposta;
}