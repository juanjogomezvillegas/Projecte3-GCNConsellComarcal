<?php

function ctrlDoActualitzarArticle($peticio, $resposta, $contenidor)
{
    $articlesPDO = $contenidor->articlesPDO();
    $categoriesPDO = $contenidor->categoriesPDO();

    $usuarilogat = $peticio->get(INPUT_COOKIE, "usuarilogat");
    $idarticle = $peticio->get(INPUT_GET, "id");
    $contingut = $peticio->getRaw(INPUT_POST, "contingut");
    $titol = $peticio->get(INPUT_POST, "titol");
    $publicat = $peticio->get(INPUT_POST, "publicat");
    $categoria = $peticio->get(INPUT_POST, "categoria");

    $dadescategoria = $categoriesPDO->getllistat();

    $numPublicat;
    if ($publicat == "on") {
        $numPublicat = 1;
    } else {
        $numPublicat = 0;
    }
    
    $message = '';

    if(!empty($contingut) | !empty($titol)){
        $articlesPDO -> update($idarticle,$titol,$contingut,$numPublicat, $categoria, $usuarilogat);
    } else{
        $message = $articlesPDO -> getAlert('faltacamp');
    }

    $article = $articlesPDO->show($idarticle);

    $resposta->redirect("Location:index.php?r=llistararticle");

    return $resposta;
}