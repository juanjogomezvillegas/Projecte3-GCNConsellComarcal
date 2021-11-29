<?php
/**
 * Classe que gestiona la gestio dels categories
 * **/

/**
 * Article PDO: Classe que gestiona la gestio de categories
 * 
 * Sera la classe que servira per esborrar, crear, modificar les categoria de l'aplicació
 * **/
class CategoriesPDO extends ModelPDO
{
    private $taula = "categoria";

 public function gettotalregistres()
    {
        $article = parent::totalregistres($this->taula);

        return $article;
    }

}