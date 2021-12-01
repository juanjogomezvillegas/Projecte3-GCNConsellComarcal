<?php

/**
    * Exemple de MVC per a M07 Desenvolupament d'aplicacions web en entorn de servidor.
    * Encapsula tota la resposta HTTP del framework emeset.
    * @author: Dani Prados dprados@cendrassos.net
    *
    * Objecte que encapsula la resposta.
    *
**/

namespace Emeset\HTTP;

/**
    * Resposta: Objecte que encapsula la resposta.
    * @author: Dani Prados dprados@cendrassos.net
    *
    * Per guarda tota la informació de la resposta.
    *
**/
class Resposta
{

    public $valors = [];
    public $header = false;
    public $path;
    public $plantilla;
    public $redireccio = false;

    /**
     * __construct:  Té tota la informació per crear la resposta
     *
     * @param $path string path fins a la carpeta de plantilles.
    **/
    public function __construct($path = "../src/vistes/")
    {
        $this->path = $path;
    }

    /**
      * set:  obté un valor de l'entrada especificada amb el filtre indicat
      *
      * @param $id string identificadro del valor que deem.
      * @param $valor mixed filtre a desar
      *
    **/
    public function set($id, $valor)
    {
        $this->valors[$id] = $valor;
    }

    /**
     * setSession guarda un valor a la sessió
     *
     * @param string $id  clau del valor que volem desar
     * @param mixed $valor variable que volem desar
     * @return void
     */
    public function setSession($id, $valor)
    {
        $_SESSION[$id] = $valor;
    }

    /**
     * setCookie funció afegida per consistència crea una cookie.
     *
     * Accepta exament els mateixos paràmetres que la funció setcookie de php.
     *
     * @param string $name
     * @param string $value
     * @param integer $expire
     * @param string $path
     * @param string $domain
     * @param boolean $secure
     * @param boolean $httponly
     * @return void
     */
    public function setCookie($name, $value = "", $expire = 0, $path = "", $domain = "", $secure = false, $httponly = false)
    {
        setcookie($name, $value, $expire, $path, $domain, $secure, $httponly);
    }

    /**
     * setHeader Afegeix una capçalera http a la resposta
     *
     * @param string $header capçalera http
     * @return void
     */
    public function setHeader($header)
    {
        $this->header = $header;
    }

    /**
     * redirect.  Defineix la resposta com una redirecció. (accepta els mateixos paràmetres que header)
     *
     * @param string $header  capçalera http amb la redirecció
     * @return void
     */
    public function redirect($header)
    {
        $this->setHeader($header);
        $this->redireccio = true;
    }

    /**
     * setTemplate defineix quina plantilla utilitzarem per la resposta.
     *
     * @param string $p nom de la plantilla
     * @return void
     */
    public function setTemplate($p)
    {
        $this->plantilla = $p;
    }

    /**
     * Genera la resposta HTTP
     *
     * @return void
     */
    public function resposta()
    {
        if ($this->redireccio) {
            header($this->header);
        } else {
            if ($this->header !== false) {
                header($this->header);
            }
            extract($this->valors);
            include($this->path . $this->plantilla);
        }
    }
}
