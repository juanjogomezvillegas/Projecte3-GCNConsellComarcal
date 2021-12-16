<?php

function ctrlEsborrarcategoria($peticio, $resposta, $contenidor)
{
    $categoriesPDO = $contenidor->categoriesPDO();

    $idcategoria= $peticio->get(INPUT_GET, "id");
    $usuarilogat = $peticio->get(INPUT_COOKIE, "usuarilogat");
    
    $categoriesPDO->delete($idcategoria, $usuarilogat);

    return $resposta;
}