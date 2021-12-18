<?php

function ctrlCrearslider($peticio, $resposta, $contenidor)
{
    $slidersPDO = $contenidor->slidersPDO();

    $slidersPDO -> add();

    $resposta->redirect("Location:index.php?r=sliders");

    return $resposta;
}
