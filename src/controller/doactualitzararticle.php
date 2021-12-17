<?php

function ctrlDoActualitzarArticle($peticio, $resposta, $contenidor)
{
    $articlesPDO = $contenidor->articlesPDO();
    $categoriesPDO = $contenidor->categoriesPDO();

    $usuarilogat = $peticio->get(INPUT_COOKIE, "usuarilogat");
    $idarticle = $peticio->get("INPUT_REQUEST", "id");
    $contingut = $peticio->getRaw(INPUT_POST, "contingut");
    $titol = $peticio->get(INPUT_POST, "titol");
    $publicat = $peticio->get(INPUT_POST, "publicat");
    $categoria = $peticio->get(INPUT_POST, "categoria");
    $imatgearticle = $peticio->get("FILES", "imatgearticle");
    $documents = $peticio->get("FILES", "documents[]");

    print_r($documents);

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
    } else{
        $message = $articlesPDO -> getAlert('faltacamp');
    }

    $article = $articlesPDO->show($idarticle);

    //$resposta->redirect("Location:index.php?r=actualitzararticle&id=$idarticle");

    return $resposta;
}