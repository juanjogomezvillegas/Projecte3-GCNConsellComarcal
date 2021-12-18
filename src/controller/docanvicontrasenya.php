<?php

function ctrlDoCanviarContrasenya($peticio, $resposta, $contenidor)
{
    $usuarisPDO = $contenidor->usuarisPDO();

    $IdUsuari2 = $peticio->get(INPUT_POST, "id");
    $usernameUsuari2 = $peticio->get(INPUT_POST, "username");
    $contrasenyavella2 = $peticio->get(INPUT_POST, "passantic");
    $contrasenyanova2 = $peticio->get(INPUT_POST, "passnou");
    $contrasenyanovarepetida2 = $peticio->get(INPUT_POST, "passrepetit");

    $IdUsuari = filter_var($IdUsuari2, FILTER_SANITIZE_NUMBER_INT);
    $usernameUsuari = trim(filter_var($usernameUsuari2, FILTER_SANITIZE_STRING));
    $contrasenyavella = trim(filter_var($contrasenyavella2, FILTER_SANITIZE_STRING));
    $contrasenyanova = trim(filter_var($contrasenyanova2, FILTER_SANITIZE_STRING));
    $contrasenyanovarepetida = trim(filter_var($contrasenyanovarepetida2, FILTER_SANITIZE_STRING));

    $passwordHash = $usuarisPDO -> obtenirHash($usernameUsuari);
    $passwordHash = $passwordHash['contrasenya'];

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
