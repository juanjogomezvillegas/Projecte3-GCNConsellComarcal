<?php
/**
 * Classe contenidor, té la responsabilitat d'instaciar els models i altres objectes
 * **/

namespace Emeset;

/**
 * Contenidor: Classe contenidor
 * 
 * Classe contenidor, la responsabilitat d'instaciar els models i altres objectes
 * **/
class Contenidor
{
    public $config = [];

    /**
     * __construct: Crear contenidor
     *
     * @param config paràmetres de configuració de l'aplicació.
     *
    **/
    public function __construct($config)
    {
        $this->config = $config;
    }

    public function resposta(){
        return new \Emeset\Resposta();
    }

    public function peticio(){
        return new \Emeset\Peticio();
    }
}