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
    

    $valor = $usuarisPDO -> update($id,$nom,$cognom,$usuari,$tipususuari,$email,$telefon);

    print_r($valor);
    
    $dadesusuari = $usuarisPDO->get($id);

    $resposta->set('dadesusuari', $dadesusuari);

    // $resposta->redirect("Location :index.php?r=actualitzarusuari&id=$usuari");

    $resposta->redirect("Location:index.php?r=actualitzarusuari&id=$usuari");


    return $resposta;
}