<?php

function ctrlHistorial($peticio, $resposta, $contenidor)
{
    $resposta->SetTemplate("historial.php");

    return $resposta;
}