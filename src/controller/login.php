<?php

function ctrlLogin($peticio, $resposta, $contenidor)
{
    $resposta->SetTemplate("login.php");
    return $resposta;
}