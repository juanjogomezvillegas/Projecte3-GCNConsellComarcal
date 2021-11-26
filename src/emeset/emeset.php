<?php
/**
 * Objecte que permet instanciar un objecte de l'aplicació definir el ruter que s'utilitzarà
 * **/

namespace Emeset;

/**
 * Emeset: Objecte que permet instanciar un objecte de l'aplicació definir el ruter que s'utilitzarà
 * 
 * Per instanciar un objecte de l'aplicació definir el ruter que s'utilitzarà
 * **/
class Emeset
{
    public $contenidor;
    public $ruter = null;
    public $config = [];
    public $constructor = null;

    public function __construct($contenidor)
    {
        $this->contenidor = $contenidor;

        $this->resposta = $contenidor->resposta();
        $this->peticio = $contenidor->peticio();
        $this->ruter = $contenidor->ruter();
    }

    public function ruta($id, $callback, $midelware = false)
    {
        $this->ruter->ruta($id, $callback, $midelware);
    }

    public function executa()
    {
        $resposta = $this->ruter->executa($this->peticio, $this->resposta);
        $resposta->resposta();
    }
}