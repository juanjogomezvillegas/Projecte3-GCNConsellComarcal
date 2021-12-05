<?php

function ctrlDoContacte($peticio, $resposta, $contenidor)
{
    $contactePDO = $contenidor->contactePDO();

    $nom = $peticio->get(INPUT_POST, "nom");

    $email = $peticio->get(INPUT_POST, "email");

    $telefon = $peticio->get(INPUT_POST, "telefon");

    $missatge = $peticio->get(INPUT_POST, "missatge");

    $contactePDO -> add($nom,$email,$telefon,$missatge,$contactePDO);

    $resposta->SetTemplate("contacte.php");

    return $resposta;
}