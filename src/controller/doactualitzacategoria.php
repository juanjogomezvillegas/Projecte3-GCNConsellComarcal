<?php

function ctrlDoactualitzacategoria($peticio, $resposta, $contenidor)
{
    $categoriesPDO = $contenidor->categoriesPDO();

    $usuarilogat = $peticio->get(INPUT_COOKIE, "usuarilogat");
    $nomCategoria = $peticio->get(INPUT_POST, "nom");
    $nomAntic = $peticio->get(INPUT_POST, "nomAntic");
    
    $message = '';

    if(!empty($nomCategoria)){
        $categoriesPDO->update($nomCategoria, $usuarilogat, $nomAntic);
    } else{
        $message = $categoriesPDO->getAlert('faltacamp');
    }

    $resposta->redirect("Location:index.php?r=llistarcategoria");

    return $resposta;
}