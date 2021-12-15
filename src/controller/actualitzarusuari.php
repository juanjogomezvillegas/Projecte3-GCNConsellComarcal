<?php

function ctrlActualitzarusuari($peticio, $resposta, $contenidor)
{
    $usuarisPDO = $contenidor->UsuarisPDO();

    $usuari = $peticio->get("INPUT_REQUEST", "id");

    $dadesusuari = $usuarisPDO->get($usuari);

    $resposta->set('dadesusuari', $dadesusuari);

    $resposta->SetTemplate("actualitzarusuari.php");

    return $resposta;
}
