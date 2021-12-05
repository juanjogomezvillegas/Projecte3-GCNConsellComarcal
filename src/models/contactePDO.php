<?php
/**
 * Classe que gestiona la gestio dels categories
 * **/

/**
 * Article PDO: Classe que gestiona la gestio de categories
 * 
 * Sera la classe que servira per esborrar, crear, modificar les categoria de l'aplicació
 * **/
class ContactePDO extends ModelPDO
{
    private $taula = "contacte";

    /**
     * gettotalregistres: Mostra el numero total de categories
     **/
 public function gettotalregistres()
    {
        $contacte = parent::totalregistres($this->taula);

        return $contacte;
    }
    /**
     * getllistat: Mostra tots els articles
     **/
    public function getllistat()
    {
        $contacte = parent::llistat($this->taula);

        return $contacte;
    }

    public function add($nom,$email,$telefon,$missatge)
    {
        $taula2 = $this->taula;

        $query = "insert into $taula2 (nom,email,telefon,missatge) values (:nom,:email,:telefon,:missatge);";
        $stm = $this->sql->prepare($query);
        $result = $stm->execute([':nom' => $nom,':email' => $email,':telefon' => $telefon,':missatge' => $missatge]);

        if ($stm->errorCode() !== '00000') {
            $err = $stm->errorInfo();
            $code = $stm->errorCode();
            die("Error.   {$err[0]} - {$err[1]}\n{$err[2]} $query");
        }

        return $stm->fetch(\PDO::FETCH_ASSOC);
    }
}