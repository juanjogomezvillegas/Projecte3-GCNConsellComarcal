<?php

function ctrlActualitzarusuari($peticio, $resposta, $contenidor)
{
    $usuarisPDO = $contenidor->usuarisPDO();

    $idusuari = $peticio->get("INPUT_REQUEST", "id");

    $dadesusuari = $usuarisPDO->get($idusuari);

    $resposta->set('dadesusuari', $dadesusuari);

    $resposta->SetTemplate("actualitzarusuari.php");

    return $resposta;
}
