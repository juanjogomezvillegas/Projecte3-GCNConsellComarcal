<?php

/**
 * Exemple de MVC per a M07 Desenvolupament d'aplicacions web en entorn de servidor.
 * Encapsula tota la petició HTTP del framework emeset.
 *
 * @author: Dani Prados dprados@cendrassos.net
 *
 * Model que gestiona la petició d'una aplicació HTTP
 **/

namespace Emeset\HTTP;

if (!defined('INPUT_REQUEST')) {
    define("INPUT_REQUEST", "INPUT_REQUEST");
}

/**
 * Petició: objecte que gestiona la petició HTTP.
 *
 * @author: Dani Prados dprados@cendrassos.net
 *
 * Encapsula la petició HTTP per permetre llegir-la com una entrada.
 **/
class Peticio
{

    /**
     * __construct:  Crear el petició http
     **/
    public function __construct()    
    {
        session_start();
    }

    /**
     * Get:  obté un valor de l'entrada especificada amb el filtre indicat
     *
     * @param $input   identificador de l'entrada.
     * @param $id      string amb la tasca.
     * @param $filtre  filtre a aplicar
     * @param $opcions opcions del filtre si volem un array FILTER_REQUIRE_ARRAY
     **/
    public function get($input, $id, $filtre = FILTER_SANITIZE_STRING, $opcions = 0)
    {
        $result = false;
        if ($input === 'SESSION') {
            $result = $_SESSION[$id];
        } elseif ($input === 'FILES') {
            $result = $_FILES[$id];
        } elseif ($input === "INPUT_REQUEST") {
            $var = $_REQUEST[$id];
            $result = filter_var($var, $filtre, $opcions);
        } else {
            $result = filter_input($input, $id, $filtre, $opcions);
        }
        return $result;
    }

    /**
     * getRaw:  obté un valor de l'entrada especificada sense filtrar
     *
     * @param $input   identificador de l'entrada.
     * @param $id      string amb la tasca.
     * @param $opcions opcions del filtre si volem un array FILTER_REQUIRE_ARRAY
     **/
    public function getRaw($input, $id, $opcions = 0)
    {
        return $this->get($input, $id, FILTER_DEFAULT, $opcions);
    }
}

