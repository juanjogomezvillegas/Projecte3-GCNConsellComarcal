<?php

function ctrlHistorialCategoriaConcreta($peticio, $resposta, $contenidor)
{
    $categoriesPDO = $contenidor->categoriesPDO();

    $idCategoria2 = $peticio->get("INPUT_REQUEST", "id");

    $idCategoria = filter_var($idCategoria2, FILTER_SANITIZE_NUMBER_INT);

    $historialComplet = $categoriesPDO->getHistorialConcret($idCategoria);

    $resposta->set("historialComplet", $historialComplet);

    $resposta->SetTemplate("historialCategories.php");

    return $resposta;
}
