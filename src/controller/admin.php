<?php

function ctrlAdmin($peticio, $resposta, $contenidor)
{
    $usuarisPDO = $contenidor->usuarisPDO();

    $totalusers = $usuarisPDO->gettotalregistres();

    $resposta->set('totalusers', $totalusers);

    $resposta->SetTemplate("admin.php");
    
    return $resposta;
}