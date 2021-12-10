<?php

function ctrlAdmin($peticio, $resposta, $contenidor)
{
    $articlesPDO = $contenidor->articlesPDO();
    $usuarisPDO = $contenidor->usuarisPDO();
    $categoriesPDO = $contenidor->categoriesPDO();

    $tempsresfresc = $peticio->get(INPUT_COOKIE, "tempsresfresc");

    $totalarticle = $articlesPDO->gettotalregistres();

    $totalusers = $usuarisPDO->gettotalregistres();

    $totalcategories = $categoriesPDO->gettotalregistres();

    if (!isset($tempsresfresc)) {
        $tempsresfresc = 10;
    }

    $resposta->set('tempsresfresc', $tempsresfresc);
    $resposta->set('totalarticle', $totalarticle);
    $resposta->set('totalusers', $totalusers);
    $resposta->set('totalcategories', $totalcategories);


    $resposta->SetTemplate("admin.php");
    
    return $resposta;
}