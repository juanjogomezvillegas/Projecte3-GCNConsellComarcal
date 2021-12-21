<?php

function ctrlSliders($peticio, $resposta, $contenidor)
{
    $slidersPDO = $contenidor->slidersPDO();

    $dadesliders = $slidersPDO->getllistat();

    $resposta->set('dadesliders', $dadesliders);

    $resposta->SetTemplate("sliders.php");

    return $resposta;
}
