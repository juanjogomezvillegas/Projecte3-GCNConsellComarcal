<?php

function ctrlDoLogin($peticio, $resposta, $contenidor)
{
    $usuarisPDO = $contenidor->usuarisPDO();

    $usuarilogat = $peticio->get(INPUT_POST, "inputusuari");

    $passwordlogat = $peticio->get(INPUT_POST, "inputpassword");

    $recaptcha_response = $peticio->get(INPUT_POST, 'recaptcha_response');

    $recaptcha = $usuarisPDO -> validacionRecaptcha($recaptcha_response);

    if ($recaptcha->score >= 0.7) {

        $resposta->setCookie("usuarilogat", $usuarilogat, strtotime("+1 month"));

        $passwordHash = $usuarisPDO -> obtenirHash($usuarilogat);

        $passwordHash = $passwordHash['contrasenya'];
    
        $logat = $usuarisPDO->islogin($usuarilogat, $passwordlogat,$passwordHash);

        if ($logat) {
            $error = false;
        } else {
            $error = true;
        }

        $resposta->setSession("logat", $logat);

        $dadesUsuari = $usuarisPDO->get($usuarilogat);

        if (!$error) {
            if ($dadesUsuari["rol"] === "Administrador") {
                $resposta->redirect("Location:index.php?r=admin");
            } else {
                $resposta->redirect("Location:index.php");
            }
        } else {
            $resposta->redirect("Location:index.php?r=login&error=1");
        }
    } else {

        $resposta->redirect("Location:index.php?r=login&error=2");

    }


    return $resposta;
}
