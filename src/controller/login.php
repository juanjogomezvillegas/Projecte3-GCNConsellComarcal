<?php

function ctrlLogin($peticio, $resposta, $contenidor)
{
    $usuarilogat = $peticio->get(INPUT_COOKIE, "usuarilogat");

    $error = $peticio->get(INPUT_GET, "error");  

    if(!empty($error)){
        $resposta->set("error", $error);
    }

    $resposta->set("usuarilogat", $usuarilogat);

    $resposta->SetTemplate("login.php");
    
    return $resposta;
}