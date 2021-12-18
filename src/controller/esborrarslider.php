<?php

function ctrlEsborrarslider($peticio, $resposta, $contenidor)
{
    $slidersPDO = $contenidor->slidersPDO();

    $idslider = $peticio->get(INPUT_GET, "id");  
    
    $slidersPDO->delete($idslider);

    $resposta->redirect("Location:index.php?r=sliders");

    return $resposta;
}