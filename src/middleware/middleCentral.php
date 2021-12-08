<?php

/**
 * Middelware que gestiona l'aplicació
 *
 * @param petitcio $peticio
 * @param resposta $resposta
 * @param funcio $next  ha de ser el controlador
 * @param array $config  paràmetres de configuració de l'aplicació
 * @return result
 */
function middleCentral($peticio, $resposta, $contenidor, $next)
{    
    $usuarisPDO = $contenidor->usuarisPDO();

    $r = $peticio->get("INPUT_REQUEST", "r");
    $usuarilogat = $peticio->get(INPUT_COOKIE, "usuarilogat");
    $logat = $peticio->get("SESSION", "logat");
    
    $dadesUsuariLogat = $usuarisPDO->get($usuarilogat);

    if ($r === "admin" || $r == "") {
        $resposta->setCookie("rCookie", $r, strtotime("+1 month"));
    }
    
    $resposta->set("dadesUsuariLogat", $dadesUsuariLogat);
    $resposta->set("usuarilogat", $usuarilogat);
    $resposta->set("logat", $logat);

    $resposta = nextMiddleware($peticio, $resposta, $contenidor, $next);

    return $resposta;
}