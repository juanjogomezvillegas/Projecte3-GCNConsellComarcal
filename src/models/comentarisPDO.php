<?php

/**
 * Classe que gestiona la gestio de Contacte
 * **/

/**
 * Article PDO: Classe que gestiona la gestio de Contacte
 *
 * Sera la classe que servira per esborrar i consultar els missatges enviats per els usuaris de l'aplicació
 * **/
class ComentarisPDO extends ModelPDO
{
    private $taula = "comentaris_article";

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
    public function getllistatPublic($id)
    {
        $query = "select ca.*, (select concat(nom, ' ', cognom) from usuari where id = ca.id_usuari) as nomUsuari
        from comentaris_article ca
        where id_article = :idarticle
        order by ca.data_enviament desc;";
        $stm = $this->sql->prepare($query);
        $result = $stm->execute([':idarticle' => $id]);

        $registres = array();
        while ($registre = $stm->fetch(\PDO::FETCH_ASSOC)) {
            $registres[$registre["id"]] = $registre;
        }

        return $registres;
    }

    public function add($missatge, $article, $usuari)
    {
        $taula2 = $this->taula;

        $dataActual = new DateTime();

        $query = "insert into $taula2 (missatge,id_article,id_usuari,data_enviament) values (:missatge,:article,:usuari,:enviament);";
        $stm = $this->sql->prepare($query);
        $result = $stm->execute([':missatge' => $missatge,':article' => $article,':usuari' => $usuari,':enviament' => $dataActual->format("Y-n-j H:i:s")]);

        if ($stm->errorCode() !== '00000') {
            $err = $stm->errorInfo();
            $code = $stm->errorCode();
            die("Error.   {$err[0]} - {$err[1]}\n{$err[2]} $query");
        }

        return $stm->fetch(\PDO::FETCH_ASSOC);
    }

    public function delete($id)
    {
        $taula2 = $this->taula;

        $query = "delete from $taula2 where id = :id;";
        $stm = $this->sql->prepare($query);
        $result = $stm->execute([':id' => $id]);

        if ($stm->errorCode() !== '00000') {
            $err = $stm->errorInfo();
            $code = $stm->errorCode();
            die("Error.   {$err[0]} - {$err[1]}\n{$err[2]} $query");
        }

        $query = "alter table $taula2 AUTO_INCREMENT = 1;";
        $stm = $this->sql->prepare($query);
        $result = $stm->execute([]);

        return $stm->fetch(\PDO::FETCH_ASSOC);
    }
}
