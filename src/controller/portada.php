<?php

function ctrlPortada($peticio, $resposta, $contenidor)
{
    $articlesPDO = $contenidor->articlesPDO();
    $usuarisPDO = $contenidor->usuarisPDO();

    $usuarilogat = $peticio->get(INPUT_COOKIE, "usuarilogat");

    $articlesPortada = $articlesPDO->getllistatPortada(5);

    $articlesFavoritsTots = $articlesPDO->getllistatTotsFavorits();

    $dadesUsuari = $usuarisPDO->get($usuarilogat);

    $resposta->set("articlesPortada", $articlesPortada);
    $resposta->set("articlesFavoritsTots", $articlesFavoritsTots);
    $resposta->set("dadesUsuari", $dadesUsuari);

    $resposta->SetTemplate("portada.php");
    
    return $resposta;
}