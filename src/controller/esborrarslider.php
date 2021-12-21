<?php

function ctrlEsborrarslider($peticio, $resposta, $contenidor)
{
    $slidersPDO = $contenidor->slidersPDO();

    $idslider2 = $peticio->get(INPUT_GET, "id");

    $idslider = filter_var($idslider2, FILTER_SANITIZE_NUMBER_INT);

    $slidersPDO->delete($idslider);

    $resposta->redirect("Location:index.php?r=sliders");

    return $resposta;
}
