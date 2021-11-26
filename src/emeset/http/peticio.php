<?php
/**
 * Classe per gesionar la peticio HTTP
 * **/

namespace Emeset\HTTP;

/**
 * Petitcio: Classe que gestiona la petició HTTP
 * 
 * Encapsula la petició HTTP per permetre llegir-la com una entrada
 * **/
class Peticio
{
    /**
     * __construct: Crear el petició http
     *
    **/
    public function __construct()
    {
        session_start();
    }

    /**
      * get: obté un valor de l'entrada especificada amb el filtre indicat
      *
      * @param input identificador de l'entrada.
      * @param id string amb la tasca.
      * @param filtre filtre a aplicar
      * @param opcions opcions del filtre si volem un array FILTER_REQUIRE_ARRAY
      *
    **/
    public function get($input, $id, $filtre = FILTER_SANITIZE_STRING, $opcions = 0)
    {
        $result = false;
        if ($input === 'SESSION') {
            $result = $_SESSION[$id];
        } elseif ($input === 'FILES') {
            $result = $_FILES[$id];
        } elseif ($input === INPUT_REQUEST) {
            $var = $_REQUEST[$id];
            $result = filter_var($var,$filtre, $opcions);
        } else {
            $result = filter_input($input, $id, $filtre, $opcions);
        }
        return $result;
    }
}