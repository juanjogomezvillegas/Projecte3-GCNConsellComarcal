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
    private $sql;

    /**
     * __construct: S'encarrega de establir la connexió amb la base de dades
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
      * llistat: Mostra tots els registres de la taula especificada per parametre
      * @param taula taula que volem consultar
      **/
    public function llistat($taula)
    {
        $query = "select * from :taula;";
         $stm = $this->sql->prepare($query);
         $result = $stm->execute([':taula' => $taula]);
 
         if ($stm->errorCode() !== '00000') {
             $err = $stm->errorInfo();
             $code = $stm->errorCode();
             die("Error.   {$err[0]} - {$err[1]}\n{$err[2]} $query");
         }
 
         return $stm->fetch(\PDO::FETCH_ASSOC);
    }
}