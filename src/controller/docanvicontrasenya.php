<?php

function ctrlDoCanviarContrasenya($peticio, $resposta, $contenidor)
{
    $usuarisPDO = $contenidor->usuarisPDO();

    $IdUsuari = $peticio->get(INPUT_POST, "id");

    $usernameUsuari = $peticio->get(INPUT_POST, "username");

    $passwordHash = $usuarisPDO -> obtenirHash($usernameUsuari);

    $passwordHash = $passwordHash['contrasenya'];

    $contrasenyavella = $peticio->get(INPUT_POST, "passantic");

    $contrasenyanova = $peticio->get(INPUT_POST, "passnou");

    $contrasenyanovarepetida = $peticio->get(INPUT_POST, "passrepetit");

    $verifica = $usuarisPDO -> verificarPassword($contrasenyavella,$passwordHash);
    $message='';

    $error = false;
    
    if($verifica == 1){
        $error = false;
        if($contrasenyanova == $contrasenyanovarepetida){
            $error = false;
            $passwordHashNou = $usuarisPDO -> crearPasswordEncriptat($contrasenyanova);

            $usuarisPDO -> updatepassword($passwordHashNou,$IdUsuari);
            
            $resposta->redirect("Location:index.php?r=perfilusuari");
         }else{
            $error=true;
            $message = $usuarisPDO -> getAlert('passnouincorrecte');
            $resposta->redirect("Location:index.php?r=canviarcontrasenya");  
        }
    }else{
        $error=true;
        $message = $usuarisPDO -> getAlert('passanticincorrecte');
        $resposta->redirect("Location:index.php?r=canviarcontrasenya");
     }
    return $resposta;
}
