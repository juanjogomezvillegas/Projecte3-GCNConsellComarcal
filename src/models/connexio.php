<?php

/**
 * Classe que gestiona la connexió a la base de dades
 * **/

/**
 * Connexio: Classe que gestiona la connexió a la base de dades
 *
 * Sera la classe que servira de model per els altres models que es connectin a la base de dades
 * **/
class Connexio
{
    private $sql;

    /**
     * __construct: S'encarrega de establir la connexió amb la base de dades
     *
     * @param config conte les dades necessaries per connectar-se amb la base de dades
     **/
    public function __construct($config)
    {
        $dsn = "mysql:dbname={$config['dbname']};host={$config['host']}";
        $usuari = $config['user'];
        $password = $config['pass'];

        try {
            $this->sql = new \PDO($dsn, $usuari, $password);
        } catch (\PDOException $e) {
            die("Ha fallat la connexió: " . $e->getMessage() . " $usuari");
        }
    }
    /**
     * getConnexio: S'encarrega de retorna la connexio a la base de dades
     *
     * @return sql la connexio a la base de dades
     **/
    public function getConnexio()
    {
        return $this->sql;
    }
}
