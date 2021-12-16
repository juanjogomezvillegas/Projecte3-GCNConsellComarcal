<?php

function ctrlArticlespreferitsusuari($peticio, $resposta, $contenidor)
{
    $articlesPDO = $contenidor->articlesPDO();
    $usuarisPDO = $contenidor->usuarisPDO();

    $nomUsuari = $peticio->get(INPUT_COOKIE, "usuarilogat");

    $articlesFavorits = $articlesPDO->getllistatFavorits($nomUsuari);

    $articlesFavoritsTots = $articlesPDO->getllistatTotsFavorits();

    $dadesUsuari = $usuarisPDO->get($usuarilogat);

    $resposta->set('articlesFavorits', $articlesFavorits);
    $resposta->set("articlesFavoritsTots", $articlesFavoritsTots);
    $resposta->set("dadesUsuari", $dadesUsuari);

    $resposta->SetTemplate("articlespreferitsusuari.php");

    return $resposta;
}