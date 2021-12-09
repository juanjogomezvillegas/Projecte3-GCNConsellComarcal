<?php

use Emeset\Contenidor;

function ctrlCrearArticle($peticio, $resposta, $contenidor)
{
    $articlesPDO = $contenidor -> ArticlesPDO();

    //Necessito una funció que retorni el usuari logat actual

    $usuariLogat = NULL;

    $valorspredefinits = $articlesPDO -> getArrayValorsPredefinits($usuariLogat);

    $resposta->SetTemplate("creararticle.php");
    return $resposta;
}