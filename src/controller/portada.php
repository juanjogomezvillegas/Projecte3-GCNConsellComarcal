<?php

function ctrlPortada($peticio, $resposta, $contenidor)
{
    $resposta->SetTemplate("portada.php");
    return $resposta;
}