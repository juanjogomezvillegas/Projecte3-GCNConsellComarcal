<?php

function ctrlActualitzarslider($peticio, $resposta, $contenidor)
{
    $slidersPDO = $contenidor->slidersPDO();

    $idslider2 = $peticio->get("INPUT_REQUEST", "id");

    $idslider = filter_var($idslider2, FILTER_SANITIZE_NUMBER_INT);

    $dadesSlider = $slidersPDO->get($idslider);

    $resposta->set("dadesSlider", $dadesSlider);

    $resposta->SetTemplate("actualitzarslider.php");

    return $resposta;
}
