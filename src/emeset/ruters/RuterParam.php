<?php
/**
 * Objecte que escull el controlador que s'ha d'executar
 * **/

namespace Emeset\Ruters;

/**
 * RuterParam: Objecte que escull el controlador que s'ha d'executar
 * 
 * Per escullir el controlador que s'ha d'executar
 * **/
class RuterParam
{
    public $rutes = [];
    public $config = [];

    public function __construct($config)
    {
        // Per ara no fa res
        $this->config = $config;
    }

    /**
     * Defineix el controlador i el middleware d'una ruta.
     *
     * @param string $id
     * @param function $callback
     * @param function $midelware
     * @return void
     */
    public function ruta($id, $callback, $midelware = false)
    {
        $this->rutes[$id] = [$callback, $midelware];
    }

    /**
     * executa el controlador vinculat a la ruta definida
     *
     * @param Emeset/HTTP/Peticio $peticio
     * @param Emeset/HTTP/Resposta $resposta
     * @return Emeset/HTTP/Resposta
     */
    public function executa($peticio, $resposta)
    {
        $ruta = $peticio->get(INPUT_REQUEST, "r");

        if (is_null($ruta)) {
            $ruta = "";    
        }
         
        if(isset($this->rutes[$ruta])){
            $controlador = $this->rutes[$ruta];
        } elseif(isset($this->rutes[0])) {
            $controlador = $this->rutes[0];
        } else {
            throw("Ruta no definida!");
            die();
        }

        // si té mildeware definit l'executem
        /* if ($controlador[1]) {
            if(is_array($controlador[1])){
                $resposta = nextMiddleware($peticio, $resposta, $this->config, $controlador[0], $controlador[1]);
            } else {
                $resposta = $controlador[1]($peticio, $resposta, $this->config, $controlador[0]);    
            }
            
        } else {
            $resposta = $controlador[0]($peticio, $resposta, $this->config);
        }
 */
        $action = [];
        if ($controlador[1]) {
            //$resposta = $controlador[1]($peticio, $resposta, $this->config, $controlador[0]);
            if (is_array($controlador[1])) {
                array_push($action, ...$controlador[1]);
            } else {
                array_push($action, $controlador[1]);
            }
            array_push($action, $controlador[0]);
        } else {
            //$resposta = $controlador[0]($peticio, $resposta, $this->config);
            $action[] = $controlador[0];
        }
        $resposta = nextMiddleware($peticio, $resposta, $this->config, $action);


        return $resposta;
    }
}