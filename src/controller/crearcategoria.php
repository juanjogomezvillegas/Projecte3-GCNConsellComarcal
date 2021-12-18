<?php

function ctrlCrearCategoria($peticio, $resposta, $contenidor)
{
    $resposta->SetTemplate("crearcategoria.php");
    return $resposta;
}
