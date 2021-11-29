<?php

function ctrlAdmin($peticio, $resposta, $contenidor)
{
    $articlesPDO = $contenidor->articlesPDO();
    $usuarisPDO = $contenidor->usuarisPDO();
    $categoriesPDO = $contenidor->categoriesPDO();

    $totalarticle = $articlesPDO->gettotalregistres();

    $totalusers = $usuarisPDO->gettotalregistres();

    $totalcategories = $categoriesPDO->gettotalregistres();


    $resposta->set('totalarticle', $totalarticle);
    $resposta->set('totalusers', $totalusers);
    $resposta->set('totalcategories', $totalcategories);


    $resposta->SetTemplate("admin.php");
    
    return $resposta;
}