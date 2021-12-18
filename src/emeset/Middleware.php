<?php

function nextMiddleware($peticio, $resposta, $contenidor, $next)
{
    if (is_array($next)) {
        if (count($next) > 1) {
            $call = array_shift($next);
            //echo $call. " ";
            $resposta = $call($peticio, $resposta, $contenidor, $next);
        } else {
            $resposta = call_user_func($next[0], $peticio, $resposta, $contenidor);
        }
    } else {
        $resposta = call_user_func($next, $peticio, $resposta, $contenidor);
    }

    return $resposta;
}
