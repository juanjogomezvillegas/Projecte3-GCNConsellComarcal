<?php

function ctrlMostrarTramits($peticio, $resposta, $contenidor)
{
    $articlesPDO = $contenidor->articlesPDO();
    $usuarisPDO = $contenidor->usuarisPDO();

    $usuarilogat = $peticio->get(INPUT_COOKIE, "usuarilogat");
    
    $articlesPortadaTramits = $articlesPDO->getllistatPortadaTramits(0);

    $articlesFavoritsTots = $articlesPDO->getllistatTotsFavorits();

    $dadesUsuari = $usuarisPDO->get($usuarilogat);

    $resposta->set("articlesPortadaTramits", $articlesPortadaTramits);
    $resposta->set("articlesFavoritsTots", $articlesFavoritsTots);
    $resposta->set("dadesUsuari", $dadesUsuari);

    $resposta->SetTemplate("mostrarTramits.php");

    return $resposta;
}