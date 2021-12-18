<?php

function ctrlEsborrarmissatge($peticio, $resposta, $contenidor)
{
    $contactePDO = $contenidor->contactePDO();

    $idmissatge2 = $peticio->get("INPUT_REQUEST", "id");

    $idmissatge = filter_var($idmissatge2, FILTER_SANITIZE_NUMBER_INT);
    
    $contactePDO->delete($idmissatge);

    $resposta->redirect("Location:index.php?r=llistarmissatges");

    return $resposta;
}