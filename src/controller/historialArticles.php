<?php

function ctrlHistorialArticles($peticio, $resposta, $contenidor)
{
    $articlesPDO = $contenidor->articlesPDO();

    $historialComplet = $articlesPDO->getHistorialComplet();

    $resposta->set("historialComplet", $historialComplet);

    $resposta->SetTemplate("historialArticles.php");

    return $resposta;
}
