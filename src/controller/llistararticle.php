<?php

function ctrlLlistararticle($peticio, $resposta, $contenidor)
{
    $articlesPDO = $contenidor->articlesPDO();

    $dadesarticle = $articlesPDO->getllistat();

    $resposta->set('dadesarticle', $dadesarticle);

    $resposta->SetTemplate("llistararticle.php");

    return $resposta;
}