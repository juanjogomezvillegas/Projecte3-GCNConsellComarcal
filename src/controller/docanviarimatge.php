<?php

function ctrlDoCanviarImatge($peticio, $resposta, $contenidor)
{
    $usuarisPDO = $contenidor->usuarisPDO();

    $idusuari2 = $peticio->get(INPUT_POST, "id");
    $imatgeusuari = $peticio->get("FILES", "imatgeusuari");

    $idusuari = filter_var($idusuari2, FILTER_SANITIZE_NUMBER_INT);

    if (isset($imatgeusuari["name"]) && ($imatgeusuari["type"] === "image/png" || $imatgeusuari["type"] === "image/jpeg")) {
        $usuarisPDO->updateImage($idusuari, $imatgeusuari["name"]);

        move_uploaded_file($imatgeusuari["tmp_name"], "img/users/" . $imatgeusuari["name"]);
    }

    $resposta->redirect("Location:index.php?r=perfilusuari");

    return $resposta;
}
