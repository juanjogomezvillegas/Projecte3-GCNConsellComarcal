<?php

function ctrlDoactualitzarusuari($peticio, $resposta, $contenidor)
{
    $usuarisPDO = $contenidor->UsuarisPDO();

    $id = $peticio->get(INPUT_POST, "id");

    $usuari = $peticio->get(INPUT_POST, "username");

    $tipususuari = $peticio->get(INPUT_POST, "rol");
    
    $nom = $peticio->get(INPUT_POST, "nom");

    $cognom = $peticio->get(INPUT_POST, "cognom");

    $email = $peticio->get(INPUT_POST, "email");

    $telefon = $peticio->get(INPUT_POST, "telefon");
    
    
    $verificar = $usuarisPDO -> update($id,$nom,$cognom,$usuari,$tipususuari,$email,$telefon);
    
    if($verificar){
        $update = true;
    }else{
        $update = false;
    }

    $dadesusuari = $usuarisPDO->get($id);

    $resposta->set('dadesusuari', $dadesusuari);

    if($update==true){
    $resposta->redirect("Location:index.php?r=actualitzarusuari&id=$usuari");
}else{
    $resposta->redirect("Location:index.php?r=actualitzarusuari&id=$usuari&update=1");
}
    return $resposta;
}