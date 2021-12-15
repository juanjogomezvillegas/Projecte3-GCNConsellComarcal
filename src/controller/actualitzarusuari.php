<?php

function ctrlActualitzarusuari($peticio, $resposta, $contenidor)
{
    $usuarisPDO = $contenidor->UsuarisPDO();

    $usuari = $peticio->get("INPUT_REQUEST", "id");
    
    $update = $peticio->get(INPUT_GET, "update");  

    if(!empty($update)){
        $resposta->set("update", $update);
    }

    $dadesusuari = $usuarisPDO->get($usuari);

    $resposta->set('dadesusuari', $dadesusuari);

    $resposta->SetTemplate("actualitzarusuari.php");

    return $resposta;
}
