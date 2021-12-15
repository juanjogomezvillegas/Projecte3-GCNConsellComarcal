<?php

function ctrlContacte($peticio, $resposta, $contenidor)
{
    $usuarisPDO = $contenidor->usuarisPDO();

    $usuarilogat = $peticio->get(INPUT_COOKIE, "usuarilogat");
    $logat = $peticio->get("SESSION", "logat");
    $error = $peticio->get(INPUT_GET, "error");

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