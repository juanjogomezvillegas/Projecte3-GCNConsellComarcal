<?php

function ctrlLlistarusuari($peticio, $resposta, $contenidor)
{
    $usuarisPDO = $contenidor->usuarisPDO();

    $dadesusuari = $usuarisPDO->getllistat();

    $resposta->set('dadesusuari', $dadesusuari);

    $resposta->SetTemplate("llistarusuari.php");

    return $resposta;
}
