<?php

function ctrlHistorialCategoriaConcreta($peticio, $resposta, $contenidor)
{
    $categoriesPDO = $contenidor->categoriesPDO();

    $idCategoria = $peticio->get("INPUT_REQUEST", "id");

    $historialComplet = $categoriesPDO->getHistorialConcret($idCategoria);

    $resposta->set("historialComplet", $historialComplet);

    $resposta->SetTemplate("historialCategories.php");

    return $resposta;
}