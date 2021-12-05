<?php
/**
 * Classe que gestiona la gestio dels categories
 * **/

/**
 * Article PDO: Classe que gestiona la gestio de categories
 * 
 * Sera la classe que servira per esborrar, crear, modificar les categoria de l'aplicació
 * **/
class CategoriesPDO extends ModelPDO
{
    private $taula = "categoria";

    /**
     * gettotalregistres: Mostra el numero total de categories
     **/
 public function gettotalregistres()
    {
        $categoria = parent::totalregistres($this->taula);

        return $categoria;
    }
    /**
     * getllistat: Mostra tots els articles
     **/
    public function getllistat()
    {
        $categories = parent::llistat($this->taula);

        return $categories;
    }

    /**
     * getllistatPublic: Mostra tots els articles
     **/
    public function getllistatPublic()
    {
        $query = "select c.id,c.nom,concat(u.nom, ' ', u.cognom) as creador,c.data_creacio 
        from categoria c left join usuari u on c.id_usuari = u.id;";
        $stm = $this->sql->prepare($query);
        $result = $stm->execute([]);
 
        $registres = array();
        while ($registre = $stm->fetch(\PDO::FETCH_ASSOC)) {
            $registres[$registre["id"]] = $registre;
        }
  
        return $registres;
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

        return $stm->fetch(\PDO::FETCH_ASSOC);
    }

    public function add($nom)
    {
        $taula2 = $this->taula;

        $query = "insert into $taula2 (nom) values (:nom);";
        $stm = $this->sql->prepare($query);
        $result = $stm->execute([':nom' => $nom]);

        if ($stm->errorCode() !== '00000') {
            $err = $stm->errorInfo();
            $code = $stm->errorCode();
            die("Error.   {$err[0]} - {$err[1]}\n{$err[2]} $query");
        }

        return $stm->fetch(\PDO::FETCH_ASSOC);
    }
}