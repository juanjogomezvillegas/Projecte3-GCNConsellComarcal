<?php

function ctrlCrearArticle($peticio, $resposta, $contenidor)
{
    $categoriesPDO = $contenidor->categoriesPDO();

    $llistatcategoria = $categoriesPDO->getLlistat();

    $resposta->set("llistatcategoria", $llistatcategoria);

    $resposta->SetTemplate("creararticle.php");

    return $resposta;
}