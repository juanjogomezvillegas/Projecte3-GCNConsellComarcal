<?php

/**
 * Middelware que gestiona l'aplicació
 *
 * @param  petitcio $peticio
 * @param  resposta $resposta
 * @param  funcio   $next     ha de ser el controlador
 * @param  array    $config   paràmetres de configuració
 *                            de l'aplicació
 * @return result
 */
function middleCentral($peticio, $resposta, $contenidor, $next)
{
    $usuarisPDO = $contenidor->usuarisPDO();

    $r2 = $peticio->get("INPUT_REQUEST", "r");
    $usuarilogat2 = $peticio->get(INPUT_COOKIE, "usuarilogat");
    $logat2 = $peticio->get("SESSION", "logat");

    $r = trim(filter_var($r2, FILTER_SANITIZE_STRING));
    $usuarilogat = trim(filter_var($usuarilogat2, FILTER_SANITIZE_STRING));
    $logat = filter_var($logat2, FILTER_VALIDATE_BOOLEAN);

    $dadesUsuariLogat = $usuarisPDO->get($usuarilogat);

    $resposta->set("dadesUsuariLogat", $dadesUsuariLogat);
    $resposta->set("usuarilogat", $usuarilogat);
    $resposta->set("logat", $logat);

    $resposta = nextMiddleware($peticio, $resposta, $contenidor, $next);

    return $resposta;
}
