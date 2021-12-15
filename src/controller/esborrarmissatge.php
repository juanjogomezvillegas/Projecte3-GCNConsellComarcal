<?php

function ctrlEsborrarmissatge($peticio, $resposta, $contenidor)
{
    $contactePDO = $contenidor->contactePDO();

    $idmissatge = $peticio->get("INPUT_REQUEST", "id");
    
    $contactePDO->delete($idmissatge);

    $resposta->redirect("Location:index.php?r=llistarmissatges");

    return $resposta;
}