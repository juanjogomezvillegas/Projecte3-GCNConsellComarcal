<?php

function nextMiddleware($peticio, $resposta, $config, $next)
{
    $usuarisPDO = $config->usuarisPDO();

    $usuarilogat = $peticio->get(INPUT_COOKIE, "usuarilogat");
    $logat = $peticio->get("SESSION", "logat");
    
    $dadesUsuariLogat = $usuarisPDO->get($usuarilogat);
     
    $resposta->set("dadesUsuariLogat", $dadesUsuariLogat);
    $resposta->set("logat", $logat);

    if (is_array($next)) {
        if (count($next) > 1) {
            $call = array_shift($next);
            //echo $call. " ";
            $resposta = $call($peticio, $resposta, $config, $next);
        } else {
            $resposta = call_user_func($next[0], $peticio, $resposta, $config);
        }
    } else {
        $resposta = call_user_func($next, $peticio, $resposta, $config);
    }

    return $resposta;
}