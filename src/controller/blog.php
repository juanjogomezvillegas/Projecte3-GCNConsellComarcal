<?php

function ctrlBlog($peticio, $resposta, $contenidor)
{
    $resposta->SetTemplate("blog.php");
    return $resposta;
}