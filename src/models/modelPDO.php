<?php
/**
 * Classe que gestiona la connexió a la base de dades
 * **/

/**
 * ModelPDO: Classe que gestiona la connexió a la base de dades
 * 
 * Sera la classe que servira de model per els altres models que es connectin a la base de dades
 * **/
class ModelPDO
{
    protected $sql;

    /**
     * __construct: S'encarrega de establir la connexió amb la base de dades
     * @param connexio conte l'objecte que es connecta a la base de dades
     **/
    public function __construct($connexio)
    {
        $this->sql = $connexio->getConnexio();
    }


    /**
     * Metodes mes comuns entre tots els models
     * **/

    /**
      * llistat: Mostra tots els registres de la taula especificada per parametre
      * @param taula taula que volem consultar
      **/
    public function llistat($taula)
    {
        $query = "select * from $taula;";
        $stm = $this->sql->prepare($query);
        $result = $stm->execute([]);
 
        $registres = array();
        while ($registre = $stm->fetch(\PDO::FETCH_ASSOC)) {
            $registres[$registre["id"]] = $registre;
        }
 
        return $registres;
    }

    public function totalregistres($taula)
    {
        $query = "select count(*) from $taula;";
        $stm = $this->sql->prepare($query);
        $result = $stm->execute();
        
        $total = $stm->fetch(\PDO::FETCH_ASSOC);
        return $total;
    }
}