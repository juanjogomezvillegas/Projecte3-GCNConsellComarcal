<?php

function ctrlRegistre($peticio, $resposta, $contenidor)
{
    $resposta->SetTemplate("registre.php");
    return $resposta;
}