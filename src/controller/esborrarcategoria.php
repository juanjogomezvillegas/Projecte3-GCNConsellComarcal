<?php

function ctrlEsborrarcategoria($peticio, $resposta, $contenidor)
{
    $categoriesPDO = $contenidor->categoriesPDO();

    $idcategoria= $peticio->get(INPUT_GET, "id");  
    
    $categoriesPDO->delete($idcategoria);

    $resposta->redirect("Location:index.php?r=llistarcategoria");

    return $resposta;
}