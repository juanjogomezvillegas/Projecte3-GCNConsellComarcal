<?php

function ctrlTramit($peticio, $resposta, $contenidor)
{
    $resposta->SetTemplate("tramit.php");
    return $resposta;
}