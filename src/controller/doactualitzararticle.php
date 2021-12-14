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
    $imatgearticle = $peticio->get(INPUT_POST, "imatgearticle");

    $dadescategoria = $categoriesPDO->getllistat();

    if (!empty($publicat)){
        $publicat = 1;
    } else {
        $publicat = 0;
    }
    
    $message = '';

    if(!empty($contingut) | !empty($titol)){

        $articlesPDO->update($idarticle,$titol,$contingut,$publicat, $categoria, $usuarilogat);

        $articlesPDO->updateImage($idarticle, $imatgearticle);

        move_uploaded_file("/tmp/".$imatgearticle, "img/articles/".$imatgearticle);
    } else{
        $message = $articlesPDO -> getAlert('faltacamp');
    }

    $article = $articlesPDO->show($idarticle);

    print_r($_FILES);

    //$resposta->redirect("Location:index.php?r=llistararticle");

    return $resposta;
}