<?php

function ctrlDoActualitzarArticle($peticio, $resposta, $contenidor)
{
    $articlesPDO = $contenidor->articlesPDO();

    $idarticle = $peticio->get(INPUT_GET, "id");

    $contingut = $peticio->getRaw(INPUT_POST, "contingut");

    $titol = $peticio->get(INPUT_POST, "titol");

    $publicat = $peticio->get(INPUT_POST, "publicat");

    $categoria = $peticio->get(INPUT_POST, "categoria");

    $categoriesPDO = $contenidor->categoriesPDO();

    $dadescategoria = $categoriesPDO->getllistat();

    if (!empty($publicat)){
        $publicat = 1;
    }
    else{
         $publicat = 0;
        }
    
    $message = '';

    //$publicat = $peticio->get(INPUT_POST, "publicat");
    if(!empty($contingut) | !empty($titol)){

    $articlesPDO -> update($idarticle,$contingut,$titol,$publicat,);

    } else{

        $message = $articlesPDO -> getAlert('faltacamp');
    }

    $article = $articlesPDO->show($idarticle);

    $resposta->set('dadescategoria', $dadescategoria);

    $resposta->set('article', $article);

    $resposta->set('message', $message);

    $resposta->SetTemplate("actualitzararticle.php");

    //$resposta->redirect("Location:index.php?r=actualitzarcampsarticle&id=$idarticle");

    return $resposta;
}