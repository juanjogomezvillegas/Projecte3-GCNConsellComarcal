<?php

function ctrlContacte($peticio, $resposta, $contenidor)
{
    $usuarisPDO = $contenidor->usuarisPDO();

    $usuarilogat2 = $peticio->get(INPUT_COOKIE, "usuarilogat");
    $logat2 = $peticio->get("SESSION", "logat");
    $error2 = $peticio->get(INPUT_GET, "error");

    $usuarilogat = trim(filter_var($usuarilogat2, FILTER_SANITIZE_STRING));
    $logat = filter_var($logat2, FILTER_VALIDATE_BOOLEAN);
    $error = trim(filter_var($error2, FILTER_SANITIZE_STRING));

    if(!empty($error)){
        $resposta->set("error", $error);
    }

    if ($logat) {
        $dadesUsuari = $usuarisPDO->get($usuarilogat);

        $resposta->set("dadesUsuari", $dadesUsuari);
    }

    $resposta->set("logat", $logat);
    
    $resposta->SetTemplate("contacte.php");

    return $resposta;
}