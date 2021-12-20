<?php

function ctrlPortada($peticio, $resposta, $contenidor)
{
    $articlesPDO = $contenidor->articlesPDO();
    $usuarisPDO = $contenidor->usuarisPDO();

    $usuarilogat2 = $peticio->get(INPUT_COOKIE, "usuarilogat");

    $usuarilogat = trim(filter_var($usuarilogat2, FILTER_SANITIZE_STRING));

    $articlesPortada = $articlesPDO->getllistatPortada(4);

    $articlesPortadaTramits = $articlesPDO->getllistatPortadaTramits(4);

    $articlesFavoritsTots = $articlesPDO->getllistatTotsFavorits();

    $dadesUsuari = $usuarisPDO->get($usuarilogat);

    $imatgeCarpeta = $articlesPDO -> llistarFitxersCarpeta("img/slider");

    $resposta->set("imatgeCarpeta", $imatgeCarpeta);
    $resposta->set("articlesPortada", $articlesPortada);
    $resposta->set("articlesPortadaTramits", $articlesPortadaTramits);
    $resposta->set("articlesFavoritsTots", $articlesFavoritsTots);
    $resposta->set("dadesUsuari", $dadesUsuari);

    $resposta->SetTemplate("portada.php");

    return $resposta;
}
