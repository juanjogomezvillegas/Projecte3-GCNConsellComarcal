<?php
/**
 * Classe que gestiona la gestio d'usuaris
 * **/

/**
 * UsuarisPDO: Classe que gestiona la gestio d'usuaris
 * 
 * Sera la classe que servira per esborrar, crear, modificar els usuaris de l'aplicació
 * **/
class UsuarisPDO extends ModelPDO
{
    private $sql;

    /**
     * __construct: S'encarrega de establir la connexió amb la base de dades
     * @param connexio conte l'objecte que es connecta a la base de dades
     **/
    public function __construct()
    {
        $this->sql = parent::getConnexio();
    }
}