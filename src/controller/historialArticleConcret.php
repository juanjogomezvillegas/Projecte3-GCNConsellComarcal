<?php

function ctrlHistorialArticleConcret($peticio, $resposta, $contenidor)
{
    $articlesPDO = $contenidor->articlesPDO();

    $idArticle = $peticio->get("INPUT_REQUEST", "id");

    $historialComplet = $articlesPDO->getHistorialConcret($idArticle);

    $resposta->set("historialComplet", $historialComplet);

    $resposta->SetTemplate("historialArticles.php");

    return $resposta;
}