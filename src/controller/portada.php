<?php

function ctrlPortada($peticio, $resposta, $contenidor)
{
    $articlesPDO = $contenidor->articlesPDO();
    $usuarisPDO = $contenidor->usuarisPDO();

    $usuarilogat = $peticio->get(INPUT_COOKIE, "usuarilogat");

    $articlesPortada = $articlesPDO->getllistatPortada(4);

    $articlesPortadaTramits = $articlesPDO->getllistatPortadaTramits(4);

    $articlesFavoritsTots = $articlesPDO->getllistatTotsFavorits();

    $dadesUsuari = $usuarisPDO->get($usuarilogat);

    $resposta->set("articlesPortada", $articlesPortada);
    $resposta->set("articlesPortadaTramits", $articlesPortadaTramits);
    $resposta->set("articlesFavoritsTots", $articlesFavoritsTots);
    $resposta->set("dadesUsuari", $dadesUsuari);

    $resposta->SetTemplate("portada.php");
    
    return $resposta;
}