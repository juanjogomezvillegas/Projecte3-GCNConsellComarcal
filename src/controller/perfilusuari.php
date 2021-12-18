<?php

function ctrlPerfilUsuari($peticio, $resposta, $contenidor)
{
    $usuarisPDO = $contenidor->UsuarisPDO();

    $usuarilogat2 = $peticio->get(INPUT_COOKIE, "usuarilogat");

    $usuarilogat = trim(filter_var($usuarilogat2, FILTER_SANITIZE_STRING));

    $dadesUsuari = $usuarisPDO->get($usuarilogat);

    $resposta->set("dadesUsuari", $dadesUsuari);

    $resposta->SetTemplate("perfilusuari.php");

    return $resposta;
}
