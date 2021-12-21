<?php

/**
 * Exemple de MVC per a M07 Desenvolupament d'aplicacions web en entorn de servidor.
 * Ruter a partir d'un parametre d'entrada.
 *
 * @author: Dani Prados dprados@cendrassos.net
 *
 * Ruter que escull quin controlador s'ha d'executar
 **/

namespace Emeset\Ruters;

/**
 * Ruter: objecte que enruta a la petició al controlador adequat.
 *
 * @author: Dani Prados dprados@cendrassos.net
 *
 * Permet definir les rutes dels controladors
 **/
class RuterParam
{
    public $rutes = [];
    public $contenidor = null;

    public function __construct($contenidor)
    {
        // Per ara no fa res
        $this->contenidor = $contenidor;
    }

    /**
     * Defineix el controlador i el middleware d'una ruta.
     *
     * @param  string   $id
     * @param  function $callback
     * @param  function $midelware
     * @return void
     */
    public function ruta($id, $callback, $midelware = false)
    {
        $this->rutes[$id] = [$callback, $midelware];
    }

    /**
     * executa el controlador vinculat a la ruta definida
     *
     * @param  Emeset/HTTP/Peticio  $peticio
     * @param  Emeset/HTTP/Resposta $resposta
     * @return Emeset/HTTP/Resposta
     */
    public function executa($peticio, $resposta)
    {
        $ruta = $peticio->get("INPUT_REQUEST", "r");

        if (is_null($ruta)) {
            $ruta = "";
        }

        if (isset($this->rutes[$ruta])) {
            $controlador = $this->rutes[$ruta];
        } elseif (isset($this->rutes[0])) {
            $controlador = $this->rutes[0];
        } else {
            throw("Ruta no definida!");
            die();
        }

        $action = [];
        if ($controlador[1]) {
            //$resposta = $controlador[1]($peticio, $resposta, $this->contenidor, $controlador[0]);
            if (is_array($controlador[1])) {
                array_push($action, ...$controlador[1]);
            } else {
                array_push($action, $controlador[1]);
            }
            array_push($action, $controlador[0]);
        } else {
            //$resposta = $controlador[0]($peticio, $resposta, $this->contenidor);
            $action[] = $controlador[0];
        }
        $resposta = nextMiddleware($peticio, $resposta, $this->contenidor, $action);


        return $resposta;
    }
}
