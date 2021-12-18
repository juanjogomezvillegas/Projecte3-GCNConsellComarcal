<?php

function ctrlEsborrarusuari($peticio, $resposta, $contenidor)
{
    $usuarisPDO = $contenidor->usuarisPDO();

    $idusuari2 = $peticio->get(INPUT_GET, "id");

    $idusuari = filter_var($idusuari2, FILTER_SANITIZE_NUMBER_INT);

    $usuarisPDO->delete($idusuari);

    return $resposta;
}
