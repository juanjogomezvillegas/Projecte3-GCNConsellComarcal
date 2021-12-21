<?php

function ctrlLogin($peticio, $resposta, $contenidor)
{
    $usuarilogat2 = $peticio->get(INPUT_COOKIE, "usuarilogat");
    $error2 = $peticio->get(INPUT_GET, "error");

    $usuarilogat = trim(filter_var($usuarilogat2, FILTER_SANITIZE_STRING));
    $error = trim(filter_var($error2, FILTER_SANITIZE_STRING));

    if (!empty($error)) {
        $resposta->set("error", $error);
    }

    $resposta->set("usuarilogat", $usuarilogat);

    $resposta->SetTemplate("login.php");

    return $resposta;
}
