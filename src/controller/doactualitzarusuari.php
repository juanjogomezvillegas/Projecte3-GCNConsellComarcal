<?php

function ctrlDoactualitzarUsuari($peticio, $resposta, $contenidor)
{
    $usuarisPDO = $contenidor->usuarisPDO();

    $usuariID = $peticio->get(INPUT_POST, "id");
    $nomUsuari = $peticio->get(INPUT_POST, "nom");
    $cognomUsuari = $peticio->get(INPUT_POST, "cognom");
    $usernameUsuari = $peticio->get(INPUT_POST, "username");
    $usernameRol = $peticio->get(INPUT_POST, "rol");
    $usernameEmail = $peticio->get(INPUT_POST, "email");
    $usernameTel = $peticio->get(INPUT_POST, "telefon");

    
    $message = '';

    if(!empty($usernameUsuari)){
        $usuarisPDO->update($usuariID,$nomUsuari,$cognomUsuari,$usernameUsuari,$usernameRol,$usernameEmail,$usernameTel);
    } else{
        $message = $usuarisPDO->getAlert('no existeix el usuari');
    }

    $resposta->redirect("Location:index.php?r=actualitzarusuari&id=$usernameUsuari");

    return $resposta;
}