<?php

function ctrlMostrarArticles($peticio, $resposta, $contenidor)
{
    $articlesPDO = $contenidor->articlesPDO();
    $usuarisPDO = $contenidor->usuarisPDO();

    $usuarilogat2 = $peticio->get(INPUT_COOKIE, "usuarilogat");

    $usuarilogat = trim(filter_var($usuarilogat2, FILTER_SANITIZE_STRING));

    $articlesPortada = $articlesPDO->getllistatPortada(0);

    $articlesFavoritsTots = $articlesPDO->getllistatTotsFavorits();

    $dadesUsuari = $usuarisPDO->get($usuarilogat);

    $resposta->set("articlesPortada", $articlesPortada);
    $resposta->set("articlesFavoritsTots", $articlesFavoritsTots);
    $resposta->set("dadesUsuari", $dadesUsuari);

    $resposta->SetTemplate("mostrarArticles.php");

    return $resposta;
}