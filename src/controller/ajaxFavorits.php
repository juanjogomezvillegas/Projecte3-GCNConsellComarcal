<?php

function ctrlAfegirFavorits($peticio, $resposta, $contenidor)
{
    $articlesPDO = $contenidor->articlesPDO();

    $nomUsuari = $peticio->get(INPUT_COOKIE, "usuarilogat");
    $idArticle = $peticio->get(INPUT_POST, "idArticle");

    $existeix = $articlesPDO->isFavorit($idArticle, $nomUsuari);

    if (!$existeix) {
        $articlesPDO->addFavorit($idArticle, $nomUsuari);

        echo "L'article ha estat afegit a favorits";
    }

    return $resposta;
}

function ctrlEsborrarFavorits($peticio, $resposta, $contenidor)
{
    $articlesPDO = $contenidor->articlesPDO();

    $nomUsuari = $peticio->get(INPUT_COOKIE, "usuarilogat");
    $idArticle = $peticio->get(INPUT_POST, "idArticle");

    $existeix = $articlesPDO->isFavorit($idArticle, $nomUsuari);

    if ($existeix) {
        $articlesPDO->deleteFavorit($idArticle, $nomUsuari);

        echo "L'article ha estat esborrat de favorits";
    }

    return $resposta;
}

function ctrlConsultarFavorits($peticio, $resposta, $contenidor)
{
    $articlesPDO = $contenidor->articlesPDO();

    $nomUsuari = $peticio->get(INPUT_COOKIE, "usuarilogat");

    $articlesFavorits = $articlesPDO->getllistatFavorits($nomUsuari);

    echo json_encode($articlesFavorits);

    return $resposta;
}