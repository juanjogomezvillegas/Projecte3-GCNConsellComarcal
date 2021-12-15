<?php

function ctrlPerfilUsuari($peticio, $resposta, $contenidor)
{
    $usuarisPDO = $contenidor->UsuarisPDO();

    $usuarilogat = $peticio->get(INPUT_COOKIE, "usuarilogat");

    $dadesUsuari = $usuarisPDO->get($usuarilogat);
    
    $resposta->set("dadesUsuari", $dadesUsuari);

    $resposta->SetTemplate("perfilusuari.php");
    
    return $resposta;
}