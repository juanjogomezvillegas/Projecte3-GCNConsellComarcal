<?php

function ctrlAfegirFavorits($peticio, $resposta, $contenidor)
{
    $articlesPDO = $contenidor->articlesPDO();

    $nomUsuari2 = $peticio->get(INPUT_COOKIE, "usuarilogat");
    $idArticle2 = $peticio->get(INPUT_POST, "idArticle");

    $nomUsuari = trim(filter_var($nomUsuari2, FILTER_SANITIZE_STRING));
    $idArticle = filter_var($idArticle2, FILTER_SANITIZE_NUMBER_INT);

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

    $nomUsuari2 = $peticio->get(INPUT_COOKIE, "usuarilogat");
    $idArticle2 = $peticio->get(INPUT_POST, "idArticle");

    $nomUsuari = trim(filter_var($nomUsuari2, FILTER_SANITIZE_STRING));
    $idArticle = filter_var($idArticle2, FILTER_SANITIZE_NUMBER_INT);

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

    $nomUsuari2 = $peticio->get(INPUT_COOKIE, "usuarilogat");

    $nomUsuari = trim(filter_var($nomUsuari2, FILTER_SANITIZE_STRING));

    $articlesFavorits = $articlesPDO->getllistatFavorits($nomUsuari);

    echo json_encode($articlesFavorits);

    return $resposta;
}