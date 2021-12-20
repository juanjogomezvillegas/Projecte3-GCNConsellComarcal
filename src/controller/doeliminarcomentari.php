<?php

function ctrlDoEliminarComentari($peticio, $resposta, $contenidor)
{
    $comentarisPDO = $contenidor->comentarisPDO();

    $idComentari2 = $peticio->get(INPUT_GET, "id");
    $idarticle2 = $peticio->get(INPUT_GET, "idArticle");

    $idComentari = trim(filter_var($idComentari2, FILTER_SANITIZE_NUMBER_INT));
    $idarticle = trim(filter_var($idarticle2, FILTER_SANITIZE_NUMBER_INT));

    $comentarisPDO->delete($idComentari);

    $resposta->redirect("Location:index.php?r=article&id=$idarticle");

    return $resposta;
}
