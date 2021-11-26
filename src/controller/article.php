<?php

function ctrlArticle($peticio, $resposta, $contenidor)
{
    $resposta->SetTemplate("article.php");
    return $resposta;
}