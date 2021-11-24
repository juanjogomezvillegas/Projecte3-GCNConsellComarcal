<?php

function ctrlDoLogin($peticio, $resposta, $contenidor)
{
    $resposta->redirect("Location:index.php?r=login");
    return $resposta;
}