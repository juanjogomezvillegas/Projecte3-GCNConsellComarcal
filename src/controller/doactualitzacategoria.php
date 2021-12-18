<?php

function ctrlDoactualitzacategoria($peticio, $resposta, $contenidor)
{
    $categoriesPDO = $contenidor->categoriesPDO();

    $usuarilogat2 = $peticio->get(INPUT_COOKIE, "usuarilogat");
    $nomCategoria2 = $peticio->get(INPUT_POST, "nom");
    $nomAntic2 = $peticio->get(INPUT_POST, "nomAntic");

    $usuarilogat = trim(filter_var($usuarilogat2, FILTER_SANITIZE_STRING));
    $nomCategoria = trim(filter_var($nomCategoria2, FILTER_SANITIZE_STRING));
    $nomAntic = trim(filter_var($nomAntic2, FILTER_SANITIZE_STRING));
    
    $message = '';

    if(!empty($nomCategoria)){
        $categoriesPDO->update($nomCategoria, $usuarilogat, $nomAntic);
    } else{
        $message = $categoriesPDO->getAlert('faltacamp');
    }

    $resposta->redirect("Location:index.php?r=llistarcategoria");

    return $resposta;
}