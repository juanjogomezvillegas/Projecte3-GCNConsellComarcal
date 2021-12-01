<?php
/**
 * Classe que gestiona la gestio dels articles
 * **/

/**
 * Article PDO: Classe que gestiona la gestio d'articles
 * 
 * Sera la classe que servira per esborrar, crear, modificar els articles de l'aplicació
 * **/
class ArticlesPDO extends ModelPDO
{
    private $taula = "article";

 public function gettotalregistres()
    {
        $article = parent::totalregistres($this->taula);

        return $article;
    }

}