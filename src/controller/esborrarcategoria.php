<?php

function ctrlEsborrarcategoria($peticio, $resposta, $contenidor)
{
    $categoriesPDO = $contenidor->categoriesPDO();

    $idcategoria2 = $peticio->get(INPUT_GET, "id");
    $usuarilogat2 = $peticio->get(INPUT_COOKIE, "usuarilogat");

    $idcategoria = filter_var($idcategoria2, FILTER_SANITIZE_NUMBER_INT);
    $usuarilogat = trim(filter_var($usuarilogat2, FILTER_SANITIZE_STRING));

    $categoriesPDO->delete($idcategoria, $usuarilogat);

    return $resposta;
}
