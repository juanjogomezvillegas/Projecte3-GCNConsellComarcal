<?php

function ctrlHistorialCategories($peticio, $resposta, $contenidor)
{
    $categoriesPDO = $contenidor->categoriesPDO();

    $historialComplet = $categoriesPDO->getHistorialComplet();

    $resposta->set("historialComplet", $historialComplet);

    $resposta->SetTemplate("historialCategories.php");

    return $resposta;
}
