<?php

function ctrlDoActualitzarArticle($peticio, $resposta, $contenidor)
{
    $articlesPDO = $contenidor->articlesPDO();
    $categoriesPDO = $contenidor->categoriesPDO();

    $usuarilogat2 = $peticio->get(INPUT_COOKIE, "usuarilogat");
    $idarticle2 = $peticio->get("INPUT_REQUEST", "id");
    $titol2 = $peticio->get(INPUT_POST, "titol");
    $publicat2 = $peticio->get(INPUT_POST, "publicat");
    $categoria2 = $peticio->get(INPUT_POST, "categoria");
    $imatgearticle = $peticio->get("FILES", "imatgearticle");
    $documents = $peticio->get("FILES", "documents");
    $contingut = $peticio->getRaw(INPUT_POST, "contingut");

    $usuarilogat = trim(filter_var($usuarilogat2, FILTER_SANITIZE_STRING));
    $idarticle = filter_var($idarticle2, FILTER_SANITIZE_NUMBER_INT);
    $titol = trim(filter_var($titol2, FILTER_SANITIZE_STRING));
    $publicat = filter_var($publicat2, FILTER_VALIDATE_BOOLEAN);
    $categoria = filter_var($categoria2, FILTER_SANITIZE_NUMBER_INT);

    if (count($documents) > 10) {
        unset($documents);
    }

    $dadescategoria = $categoriesPDO->getllistat();

    if (!empty($publicat)){
        $publicat = 1;
    } else {
        $publicat = 0;
    }

    $message = '';

    if(!empty($contingut) || !empty($titol)){

        $articlesPDO->update($idarticle,$titol,$contingut,$publicat, $categoria, $usuarilogat);

        if (isset($imatgearticle["name"]) && ($imatgearticle["type"] === "image/png" || $imatgearticle["type"] === "image/jpeg")) {
            $articlesPDO->updateImage($idarticle, $imatgearticle["name"]);

            move_uploaded_file($imatgearticle["tmp_name"], "img/articles/".$imatgearticle["name"]);
        }

        $comptadorPDF = 0;
        for ($i = 0; $i < count($documents["name"]); $i++) { 
            if (isset($documents["name"]) && $documents["type"][$i] === "application/pdf") {
                $comptadorPDF = $comptadorPDF + 1;
            }
        }
        if ($comptadorPDF == count($documents["name"])) {
            for ($i = 0; $i < count($documents["name"]); $i++) { 
                if (isset($documents["name"]) && $documents["type"][$i] === "application/pdf") {
                    $articlesPDO->addDocumentArticle($idarticle, $documents["name"][$i]);

                    move_uploaded_file($documents["tmp_name"][$i], "img/documents/".$documents["name"][$i]);
                }
            }
        }
    } else{
        $message = $articlesPDO -> getAlert('faltacamp');
    }

    $article = $articlesPDO->show($idarticle);

    $resposta->redirect("Location:index.php?r=actualitzararticle&id=$idarticle");

    return $resposta;
}