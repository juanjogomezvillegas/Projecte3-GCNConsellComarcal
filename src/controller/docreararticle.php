<?php

function ctrlDoCrearArticle($peticio, $resposta, $contenidor)
{
    $articlesPDO = $contenidor->articlesPDO();

    $usuarilogat = $peticio->get(INPUT_COOKIE, "usuarilogat");

    $titol2 = $peticio->get(INPUT_POST, "titol");
    $publicat2 = $peticio->get(INPUT_POST, "publicat");
    $categoria2 = $peticio->get(INPUT_POST, "categoria");
    $imatgearticle = $peticio->get("FILES", "imatgearticle");
    $documents = $peticio->get("FILES", "documents");
    $contingut = $peticio->getRaw(INPUT_POST, "contingut");

    $titol = trim(filter_var($titol2, FILTER_SANITIZE_STRING));
    $publicat = filter_var($publicat2, FILTER_VALIDATE_BOOLEAN);
    $categoria = filter_var($categoria2, FILTER_SANITIZE_NUMBER_INT);

    $numPublicat = 0;

    if ($publicat) {
        $numPublicat = 1;
    } else {
        $numPublicat = 0;
    }

    $idarticle = 0;
    $error = false;
    if (empty($titol)) {
        $error = true;
    } else{
        $idarticle = $articlesPDO->add($titol, $contingut, $numPublicat, $categoria, $usuarilogat);

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
    }
    if (isset($idarticle)) {
        $error = false;
    } else {
        $error = true;
    }
    if (!$error) {
        $resposta->redirect("Location:index.php?r=llistararticle");
    } else {
        $resposta->setSession("missatgeError", "Error: L'article no s'ha pogut crear!!!");
        $resposta->redirect("Location:index.php?r=creararticle");

    }
    return $resposta;
}