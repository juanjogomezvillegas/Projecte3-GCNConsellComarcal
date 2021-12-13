<?php

function ctrlArticle($peticio, $resposta, $contenidor)
{
    $articlesPDO = $contenidor->articlesPDO();

    $idarticle = $peticio->get("INPUT_REQUEST", "id");

    // $informacioArticle;
    // if ($idarticle > 0) {
    //     $dadesArticle = $articlesPDO->show($idarticle);

    //     if (isset($dadesArticle["titol"])) {
    //         $informacioArticle = $articlesPDO->getInfoArticle($idarticle);
    //     } else {
    //         $resposta->redirect("Location:index.php");
    //     }
    // } else {
    //     $resposta->redirect("Location:index.php");
    // }
    $informacioArticle = $articlesPDO->getInfoArticle($idarticle);

    $resposta->set('informacioArticle', $informacioArticle);

    $resposta->SetTemplate("article.php");

    return $resposta;
}