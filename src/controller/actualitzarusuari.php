<?php

function ctrlActualitzarusuari($peticio, $resposta, $contenidor)
{
    $usuarisPDO = $contenidor->UsuarisPDO();

    $usuari2 = $peticio->get("INPUT_REQUEST", "id");

    $usuari = trim(filter_var($usuari2, FILTER_SANITIZE_STRING));
    
    $update2 = $peticio->get(INPUT_GET, "update");

    $update = filter_var($update2, FILTER_SANITIZE_NUMBER_INT);

    if(!empty($update)){
        $resposta->set("update", $update);
    }

    $dadesusuari = $usuarisPDO->get($usuari);

    $resposta->set('dadesusuari', $dadesusuari);

    $resposta->SetTemplate("actualitzarusuari.php");

    return $resposta;
}
