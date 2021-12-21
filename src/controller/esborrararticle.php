<?php

function ctrlEsborrararticle($peticio, $resposta, $contenidor)
{
    $articlesPDO = $contenidor->articlesPDO();

    $idarticle2 = $peticio->get(INPUT_GET, "id");

    $idarticle = filter_var($idarticle2, FILTER_SANITIZE_NUMBER_INT);

    $articlesPDO->delete($idarticle);

    return $resposta;
}
