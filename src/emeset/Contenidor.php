<?php

/**
    * Exemple per a M07.
    * @author: Dani Prados dprados@cendrassos.net
    *
    * Classe contenidor,  té la responsabilitat d'instaciar els models i altres objectes.
    *
**/

namespace Emeset;

/**
    * Contenidor: Classe contenidor.
    * @author: Dani Prados dprados@cendrassos.net
    *
    * Classe contenidor, la responsabilitat d'instaciar els models i altres objectes.
    *
**/
class Contenidor
{
    public $config = [];
    public $connexio;

    /**
     * __construct:  Crear contenidor
     *
     * @param $config paràmetres de configuració de l'aplicació.
     *
    **/
    public function __construct($config)
    {
        $this->config = $config;
        $this->connexio = new \connexio($this->config);
    }

    public function resposta()
    {
        return new \Emeset\Http\Resposta("../src/view/");
    }

    public function peticio()
    {
        return new \Emeset\Http\Peticio();
    }

    public function ruter()
    {
        return new \Emeset\Ruters\RuterParam($this);
    }

    public function connexio()
    {
        return $this->connexio;
    }

    public function modelPDO()
    {
        return new \ModelPDO($this->connexio);
    }

    //Aquest model
    public function usuarisPDO()
    {
        return new \UsuarisPDO($this->connexio);
    }
    public function articlesPDO()
    {
        return new \ArticlesPDO($this->connexio);
    }
    public function categoriesPDO()
    {
        return new \CategoriesPDO($this->connexio);
    }
    public function contactePDO()
    {
        return new \ContactePDO($this->connexio);
    }
    public function slidersPDO(){
        return new \SlidersPDO($this->connexio);
    }
}
