<?php

function ctrlLlistararticle($peticio, $resposta, $contenidor)
{
    $articlesPDO = $contenidor->articlesPDO();

    $dadesarticle = $articlesPDO->getllistatPublic();

    $resposta->set('dadesarticle', $dadesarticle);

    $resposta->SetTemplate("llistararticle.php");

    return $resposta;
}