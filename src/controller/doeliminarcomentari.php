<?php

function ctrlDoEliminarComentari($peticio, $resposta, $contenidor)
{
    $comentarisPDO = $contenidor->comentarisPDO();

    $idarticle2 = $peticio->get(INPUT_GET, "idarticle");

    $idarticle = trim(filter_var($idarticle2, FILTER_SANITIZE_NUMBER_INT));

    $comentarisPDO->delete($idarticle);

    $resposta->redirect("Location:index.php?r=article&id=$idarticle");

    return $resposta;
}
