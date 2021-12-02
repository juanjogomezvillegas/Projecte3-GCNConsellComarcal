<?php

function ctrlRegistreAdmin($peticio, $resposta, $contenidor)
{
    $resposta->SetTemplate("registreadmin.php");
    return $resposta;
}