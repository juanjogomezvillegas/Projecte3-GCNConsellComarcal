<?php

function ctrlDoCanviarImatge($peticio, $resposta, $contenidor)
{
    $usuarisPDO = $contenidor->usuarisPDO();

    $imatgeusuari = $peticio->get("FILES", "imatgeusuari");

    $idusuari = $peticio->get("INPUT_REQUEST", "id");

    $message = '';

    if(!empty($imatgeusuari)){
        if (isset($imatgeusuari["name"]) && ($imatgeusuari["type"] === "image/png" || $imatgeusuari["type"] === "image/jpeg")) {
            $usuarisPDO->updateImage($idusuari, $imatgeusuari["name"]);

            move_uploaded_file($imatgeusuari["tmp_name"], "/img/users/".$imatgeusuari["name"]);
            $resposta->redirect("Location:index.php?r=perfilusuari");
        }
    } else{
        $message = $usuarisPDO -> getAlert('imatgeno');
        $resposta->redirect("Location:index.php?r=");
    }

    return $resposta;
}