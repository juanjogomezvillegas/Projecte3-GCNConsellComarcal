<?php

function ctrlAfegirFavorits($peticio, $resposta, $contenidor)
{
    $articlesPDO = $contenidor->articlesPDO();

    $nomUsuari = $peticio->get(INPUT_COOKIE, "usuarilogat");
    $idArticle = $peticio->get(INPUT_POST, "idArticle");

    $existeix = $articlesPDO->isFavorit($idArticle, $nomUsuari);

    if (!$existeix) {
        $articlesPDO->addFavorit($idArticle, $nomUsuari);

        echo "L'article ha estat afegir a favorits";
    } else {
        echo "L'article ja esta afegit a favorits";
    }

    return $resposta;
}