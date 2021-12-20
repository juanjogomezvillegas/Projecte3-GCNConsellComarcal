<?php

function ctrlDoActualitzarSlider($peticio, $resposta, $contenidor)
{
    $slidersPDO = $contenidor->slidersPDO();

    $idslider2 = $peticio->get(INPUT_POST, "id");
    $imatgeslider = $peticio->get("FILES", "imatgeslider");

    $idslider = filter_var($idslider2, FILTER_SANITIZE_NUMBER_INT);

    print_r($idslider);

    if (isset($imatgeslider["name"]) && ($imatgeslider["type"] === "image/png" || $imatgeslider["type"] === "image/jpeg")) {
        $slidersPDO->updateImage($idslider, $imatgeslider["name"]);

        move_uploaded_file($imatgeslider["tmp_name"], "img/slider/" . $imatgeslider["name"]);
    }

    $resposta->redirect("Location:index.php?r=sliders");

    return $resposta;
}
