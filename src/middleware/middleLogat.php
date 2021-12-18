<?php

/**
 * Middelware que gestiona l'autenticació
 *
 * @param petitcio $peticio
 * @param resposta $resposta
 * @param funcio $next  ha de ser el controlador
 * @param array $config  paràmetres de configuració de l'aplicació
 * @return result
 */
function middleLogat($peticio, $resposta, $contenidor, $next)
{
    $usuarisPDO = $contenidor->usuarisPDO();

    $usuarilogat2 = $peticio->get(INPUT_COOKIE, "usuarilogat");
    $logat2 = $peticio->get("SESSION", "logat");

    $usuarilogat = trim(filter_var($usuarilogat2, FILTER_SANITIZE_STRING));
    $logat = filter_var($logat2, FILTER_VALIDATE_BOOLEAN);

    $dadesUsuariLogat = $usuarisPDO->get($usuarilogat);

    $resposta->set("dadesUsuariLogat", $dadesUsuariLogat);
    $resposta->set("usuarilogat", $usuarilogat);
    $resposta->set("logat", $logat);

    // si l'usuari està logat permetem carregar el recurs
    if ($logat && ($dadesUsuariLogat["rol"] === "Administrador" || $dadesUsuariLogat["rol"] === "Gestor" || $dadesUsuariLogat["rol"] === "Usuari")) {
        $resposta = nextMiddleware($peticio, $resposta, $contenidor, $next);
    } else {
        $resposta->redirect("location: index.php?r=login");
    }
    return $resposta;
}
