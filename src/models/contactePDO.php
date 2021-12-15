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

    /**
     * getllistatPublic: Mostra tots els articles
     **/
    public function getllistatPublic()
    {
        $query = "select c.id,c.nom,c.email,c.telefon,c.missatge,concat(u.nom, ' ', u.cognom) as creador,c.data_enviament
        from contacte c
        left join usuari u on c.id_usuari = u.id;";
        $stm = $this->sql->prepare($query);
        $result = $stm->execute([]);
 
        $registres = array();
        while ($registre = $stm->fetch(\PDO::FETCH_ASSOC)) {
            $registres[$registre["id"]] = $registre;
        }
  
        return $registres;
    }

    public function add($nom,$email,$telefon,$missatge,$usuari)
    {
        $taula2 = $this->taula;

        $dataActual = new DateTime();

        $query = "insert into $taula2 (nom,email,telefon,missatge,id_usuari,data_enviament) values (:nom,:email,:telefon,:missatge,:usuari,:enviament);";
        $stm = $this->sql->prepare($query);
        $result = $stm->execute([':nom' => $nom,':email' => $email,':telefon' => $telefon,':missatge' => $missatge,':usuari' => $usuari,':enviament' => $dataActual->format("Y-n-j H:i:s")]);

        if ($stm->errorCode() !== '00000') {
            $err = $stm->errorInfo();
            $code = $stm->errorCode();
            die("Error.   {$err[0]} - {$err[1]}\n{$err[2]} $query");
        }

        return $stm->fetch(\PDO::FETCH_ASSOC);
    }
}