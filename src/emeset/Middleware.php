<?php

function nextMiddleware($peticio, $resposta, $config, $next)
{
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