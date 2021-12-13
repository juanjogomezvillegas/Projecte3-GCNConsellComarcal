<?php

function ctrlArticlespreferitsusuari($peticio, $resposta, $contenidor)
{
    $articlesPDO = $contenidor->articlesPDO();

    $nomUsuari = $peticio->get(INPUT_COOKIE, "usuarilogat");

    $articlesFavorits = $articlesPDO->getllistatFavorits($nomUsuari);

    $resposta->set('articlesFavorits', $articlesFavorits);

    $resposta->SetTemplate("articlespreferitsusuari.php");

    return $resposta;
}