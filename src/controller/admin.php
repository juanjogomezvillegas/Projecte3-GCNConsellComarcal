<?php

function ctrlAdmin($peticio, $resposta, $contenidor)
{
    $resposta->SetTemplate("admin.php");
    return $resposta;
}