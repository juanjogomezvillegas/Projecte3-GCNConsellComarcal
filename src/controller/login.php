<?php

function ctrlLogin($peticio, $resposta, $contenidor)
{
    $usuarilogat = $peticio->set(INPUT_COOKIE, "usuarilogat");
    $missatgeError = $peticio->set("SESSION", "missatgeError");

    $resposta->set("usuarilogat", $usuarilogat);
    $resposta->set("missatgeError", $missatgeError);

    if (!is_null($missatgeError)) {
        $resposta->setSession("missatgeError", null);
    }

    $resposta->SetTemplate("login.php");
    
    return $resposta;
}