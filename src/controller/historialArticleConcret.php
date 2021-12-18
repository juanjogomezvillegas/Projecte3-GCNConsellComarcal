<?php

function ctrlHistorialArticleConcret($peticio, $resposta, $contenidor)
{
    $articlesPDO = $contenidor->articlesPDO();

    $idArticle2 = $peticio->get("INPUT_REQUEST", "id");

    $idArticle = filter_var($idArticle2, FILTER_SANITIZE_NUMBER_INT);

    $historialComplet = $articlesPDO->getHistorialConcret($idArticle);

    $resposta->set("historialComplet", $historialComplet);

    $resposta->SetTemplate("historialArticles.php");

    return $resposta;
}