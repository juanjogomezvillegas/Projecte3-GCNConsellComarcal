<?php

function ctrlContacte($peticio, $resposta, $contenidor)
{
    $resposta->SetTemplate("contacte.php");

    return $resposta;
}