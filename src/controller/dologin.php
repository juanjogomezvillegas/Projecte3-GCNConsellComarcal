<?php

function ctrlDoLogin($peticio, $resposta, $contenidor)
{
    $usuarisPDO = $contenidor->usuarisPDO();

    $usuarilogat = $peticio->get(INPUT_POST, "inputusuari");

    $passwordlogat = $peticio->get(INPUT_POST, "inputpassword");

    $recaptcha_response = $peticio->get(INPUT_POST, 'recaptcha_response');

    $recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';

    $recaptcha_secret = '6LcaaJIdAAAAAMfLO4Fkuk0_eY6u80d0enMY-_7U';

    $recaptcha = file_get_contents($recaptcha_url . '?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response);

    $recaptcha = json_decode($recaptcha);

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
