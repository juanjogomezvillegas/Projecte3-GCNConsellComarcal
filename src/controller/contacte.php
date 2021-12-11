<?php

function ctrlContacte($peticio, $resposta, $contenidor)
{
    $error = $peticio->get(INPUT_GET, "error");  

    if(!empty($error)){
        $resposta->set("error", $error);
    }
    
    $resposta->SetTemplate("contacte.php");

    return $resposta;
}