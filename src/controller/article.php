<?php

function ctrlArticle($peticio, $resposta, $contenidor)
{
    $articlesPDO = $contenidor->articlesPDO();
    $comentarisPDO = $contenidor->comentarisPDO();
    $usuarisPDO = $contenidor->UsuarisPDO();

    $idarticle2 = $peticio->get(INPUT_GET, "id");

    $idarticle = filter_var($idarticle2, FILTER_SANITIZE_NUMBER_INT);

    $articleExists = $articlesPDO->show($idarticle);

    if (isset($articleExists["id"])) {
        $informacioArticle = $articlesPDO->getInfoArticle($idarticle);

        $documentsArticle = $articlesPDO->getDocumentsArticle($idarticle);

        $seguentArticle = $articlesPDO->obtenirSeguentArticle($idarticle);

        $idseguentArticle = $seguentArticle['id'];

        $nomseguentArticle = $seguentArticle['titol'];

        $anteriorArticle = $articlesPDO->obtenirAnteriorArticle($idarticle);

        $idanteriorArticle = $anteriorArticle['id'];

        $nomanteriorArticle = $anteriorArticle['titol'];

        $llistatComentarisArticle = $comentarisPDO->getllistatPublic($idarticle);

        $resposta->set('idseguentArticle', $idseguentArticle);
        $resposta->set('nomseguentArticle', $nomseguentArticle);
        $resposta->set('idanteriorArticle', $idanteriorArticle);
        $resposta->set('nomanteriorArticle', $nomanteriorArticle);
        $resposta->set('informacioArticle', $informacioArticle);
        $resposta->set('documentsArticle', $documentsArticle);
        $resposta->set('llistatComentarisArticle', $llistatComentarisArticle);

        $resposta->SetTemplate("article.php");
    } else {
        $resposta->redirect("Location:index.php?r=error");
    }

    return $resposta;
}
