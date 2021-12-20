<?php

function ctrlDoActualitzarSlider($peticio, $resposta, $contenidor)
{
    $slidersPDO = $contenidor->slidersPDO();

    $idslider2 = $peticio->get(INPUT_POST, "id");
    $imatgeslider = $peticio->get("FILES", "imatgeslider");

    $idslider = filter_var($idslider2, FILTER_SANITIZE_NUMBER_INT);

    if (isset($imatgeslider["name"]) && ($imatgeslider["type"] === "image/png" || $imatgeslider["type"] === "image/jpeg")) {
        if ($imatgeslider["type"] === "image/png") {
            $nomficher = $idslider2 . ".png";
        } else {
            $nomficher = $idslider2 . ".jpg";
        }
        $slidersPDO->updateImage($idslider, $nomficher);
        move_uploaded_file($imatgeslider["tmp_name"], "img/slider/" . $nomficher);
    }

    $resposta->redirect("Location:index.php?r=sliders");

    return $resposta;
}
