<?php

function ctrlDoLogin($peticio, $resposta, $contenidor)
{
    $usuarisPDO = $contenidor->usuarisPDO();

    $usuarilogat2 = $peticio->get(INPUT_POST, "inputusuari");
    $passwordlogat2 = $peticio->get(INPUT_POST, "inputpassword");
    $recaptcha_response = $peticio->get(INPUT_POST, 'recaptcha_response');

    $usuarilogat = trim(filter_var($usuarilogat2, FILTER_SANITIZE_STRING));
    $passwordlogat = trim(filter_var($passwordlogat2, FILTER_SANITIZE_STRING));

    $recaptcha = $usuarisPDO->validacionRecaptcha($recaptcha_response);

    if ($recaptcha->score >= 0.7) {
        $resposta->setCookie("usuarilogat", $usuarilogat, strtotime("+1 month"));

        $passwordHash = $usuarisPDO -> obtenirHash($usuarilogat);

        $passwordHash = $passwordHash['contrasenya'];

        $logat = $usuarisPDO->islogin($usuarilogat, $passwordlogat, $passwordHash);

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
