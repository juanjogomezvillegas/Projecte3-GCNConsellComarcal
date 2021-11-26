<?php

function ctrlLogout($peticio, $resposta, $contenidor)
{
    $resposta->logout();

    $resposta->redirect("Location:index.php");
    return $resposta;
}