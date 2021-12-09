<?php

function ctrlEsborrarcategoria($peticio, $resposta, $contenidor)
{
    $categoriesPDO = $contenidor->categoriesPDO();

    $idcategoria= $peticio->get(INPUT_GET, "id");
    $usuarilogat = $peticio->get(INPUT_COOKIE, "usuarilogat");
    
    $categoriesPDO->delete($idcategoria, $usuarilogat);

    $resposta->redirect("Location:index.php?r=llistarcategoria");

    return $resposta;
}