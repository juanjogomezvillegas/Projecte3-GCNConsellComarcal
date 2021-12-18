<?php

function ctrlArticlespreferitsusuari($peticio, $resposta, $contenidor)
{
    $articlesPDO = $contenidor->articlesPDO();
    $usuarisPDO = $contenidor->usuarisPDO();

    $nomUsuari2 = $peticio->get(INPUT_COOKIE, "usuarilogat");

    $nomUsuari = trim(filter_var($nomUsuari2, FILTER_SANITIZE_STRING));

    $articlesFavorits = $articlesPDO->getllistatFavorits($nomUsuari);

    $articlesFavoritsTots = $articlesPDO->getllistatTotsFavorits();

    $dadesUsuari = $usuarisPDO->get($usuarilogat);

    $resposta->set('articlesFavorits', $articlesFavorits);
    $resposta->set("articlesFavoritsTots", $articlesFavoritsTots);
    $resposta->set("dadesUsuari", $dadesUsuari);

    $resposta->SetTemplate("articlespreferitsusuari.php");

    return $resposta;
}