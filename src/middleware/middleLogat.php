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
function middleLogat($peticio, $resposta, $contenidor, $next) {
    
    $usuarisPDO = $contenidor->usuarisPDO();

    $usuarilogat = $peticio->get(INPUT_COOKIE, "usuarilogat");
    $logat = $peticio->get("SESSION", "logat");
    
    $dadesUsuariLogat = $usuarisPDO->get($usuarilogat);
     
    $resposta->set("dadesUsuariLogat", $dadesUsuariLogat);
    $resposta->set("logat", $logat);

    if(!isset($logat)){
        $usuari = "";
        $logat = false;
    } 

    $resposta->set("usuari", $usuari);
    $resposta->set("logat", $logat);

    // si l'usuari està logat permetem carregar el recurs
    if($logat) {
        $resposta = nextMiddleware($peticio, $resposta, $contenidor, $next);
    } else {
        $resposta->redirect("location: index.php?r=login");
    }
    return $resposta;
}