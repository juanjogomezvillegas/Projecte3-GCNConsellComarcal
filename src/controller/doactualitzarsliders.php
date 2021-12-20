<?php

function ctrlDoActualitzarsliders($peticio, $resposta, $contenidor)
{
    $slidersPDO = $contenidor->slidersPDO();

    $imatgeslider = $peticio->get("FILES", "imatgeslider");
    $posicio = $peticio->get(INPUT_POST, "posicio");
    $idslider = $peticio->get(INPUT_POST, "idslider");


    $posicio = filter_var($posicio, FILTER_SANITIZE_NUMBER_INT);
    $idslider = filter_var($idslider, FILTER_SANITIZE_NUMBER_INT);

    
    if (!empty($posicio)){
        $slidersPDO->update($idslider,$posicio);

        if (isset($imatgeslider["name"]) && ($imatgeslider["type"] === "image/png" || $imatgeslider["type"] === "image/jpeg")) {
            $slidersPDO->updateImage($idslider, $imatgeslider["name"]);

            move_uploaded_file($imatgeslider["tmp_name"], "img/slider/" . $imatgeslider["name"]);
        }
    } else {
        echo 'No funciona';
        }


    $resposta->redirect("Location:index.php?r=sliders");

    return $resposta;
}
