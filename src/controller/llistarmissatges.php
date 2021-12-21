<?php

function ctrlLlistarmissatges($peticio, $resposta, $contenidor)
{
    $contactePDO = $contenidor->contactePDO();

    $dadescontacte = $contactePDO->getllistatPublic();

    $resposta->set("dadescontacte", $dadescontacte);

    $resposta->SetTemplate("llistarmissatges.php");

    return $resposta;
}
