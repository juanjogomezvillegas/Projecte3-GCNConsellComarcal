<?php

function ctrlError($peticio, $resposta, $contenidor)
{
    header("Refresh: 10; https://www.gcnaltemporda.cat");

    $resposta->SetTemplate("error.php");

    return $resposta;
}
