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

    public function delete($id, $creador)
    {
        $query = "delete from categoria where id = :id;";
        $stm = $this->sql->prepare($query);
        $result = $stm->execute([':id' => $id]);

        if ($stm->errorCode() !== '00000') {
            $err = $stm->errorInfo();
            $code = $stm->errorCode();
            die("Error.   {$err[0]} - {$err[1]}\n{$err[2]} $query");
        }

        $query = "alter table categoria auto_increment = 1;";
        $stm = $this->sql->prepare($query);
        $result = $stm->execute([]);

        return $stm->fetch(\PDO::FETCH_ASSOC);
    }

    public function add($nom, $creador)
    {
        $query = "select id from usuari where username = :usuari;";
        $stm = $this->sql->prepare($query);
        $result = $stm->execute([':usuari' => $creador]);

        $usuaris = $stm->fetch(\PDO::FETCH_ASSOC);

        $dataActual = new DateTime();

        $query = "insert into categoria (nom, id_usuari, data_creacio) values (:nom, :creador, :dataCreacio);";
        $stm = $this->sql->prepare($query);
        $result = $stm->execute([':nom' => $nom, ':creador' => $usuaris["id"], ':dataCreacio' => $dataActual->format("Y-n-j H:i:s")]);

        $query = "select id from categoria where nom = :nomcategeria;";
        $stm = $this->sql->prepare($query);
        $result = $stm->execute([':nomcategeria' => $nom]);

        $categories = $stm->fetch(\PDO::FETCH_ASSOC);

        $query = "insert into usuari_categoria_edita (id_usuari, id_categoria, data_edicio, nom) values (:creador, :categoria, :dataEdicio, :nom);";
        $stm = $this->sql->prepare($query);
        $result = $stm->execute([':creador' => $usuaris["id"], ':categoria' => $categories["id"], ':dataEdicio' => $dataActual->format("Y-n-j H:i:s"), ':nom' => $nom]);

        if ($stm->errorCode() !== '00000') {
            $err = $stm->errorInfo();
            $code = $stm->errorCode();
            die("Error.   {$err[0]} - {$err[1]}\n{$err[2]} $query");
        }

        return $stm->fetch(\PDO::FETCH_ASSOC);
    }

    public function update($nom, $creador, $nomAntic)
    {
        $query = "select id from usuari where username = :usuari;";
        $stm = $this->sql->prepare($query);
        $result = $stm->execute([':usuari' => $creador]);

        $usuaris = $stm->fetch(\PDO::FETCH_ASSOC);

        $query = "select id from categoria where nom = :nomcategeria;";
        $stm = $this->sql->prepare($query);
        $result = $stm->execute([':nomcategeria' => $nomAntic]);

        $categories = $stm->fetch(\PDO::FETCH_ASSOC);

        $dataActual = new DateTime();

        $query = "update categoria set nom = :nom, id_usuari = :creador where id = :id;";
        $stm = $this->sql->prepare($query);
        $result = $stm->execute([':nom' => $nom, ':creador' => $usuaris["id"], ':id' => $categories["id"]]);

        $query = "insert into usuari_categoria_edita (id_usuari, id_categoria, data_edicio, nom) values (:creador, :categoria, :dataEdicio, :nom);";
        $stm = $this->sql->prepare($query);
        $result = $stm->execute([':creador' => $usuaris["id"], ':categoria' => $categories["id"], ':dataEdicio' => $dataActual->format("Y-n-j H:i:s"), ':nom' => $nom]);

        if ($stm->errorCode() !== '00000') {
            $err = $stm->errorInfo();
            $code = $stm->errorCode();
            die("Error.   {$err[0]} - {$err[1]}\n{$err[2]} $query");
        }

        return $stm->fetch(\PDO::FETCH_ASSOC);
    }

    public function get($id)
    {
        $taula2 = $this->taula;

        $query = "select * from $taula2 where id = :id LIMIT 1;";
        $stm = $this->sql->prepare($query);
        $result = $stm->execute([':id' => $id]);

        if ($stm->errorCode() !== '00000') {
            $err = $stm->errorInfo();
            $code = $stm->errorCode();
            die("Error.   {$err[0]} - {$err[1]}\n{$err[2]} $query");
        }

        return $stm->fetch(\PDO::FETCH_ASSOC);
    }

    public function getAlert($id){
        if ($id == 'faltacamp'){
            $id = 'Introdueix tots els camps abans de enviar les dades';
        }
        return $id;
    }

    public function getHistorialComplet()
    {
        $query = "select uc.*, concat(u.nom, ' ', u.cognom) as creador, c.nom as nomAntic 
        from usuari_categoria_edita uc 
        left join usuari u on u.id = uc.id_usuari 
        left join categoria c on c.id = uc.id_categoria
        order by uc.data_edicio desc;";
        $stm = $this->sql->prepare($query);
        $result = $stm->execute([]);

        $comptador = 0;
        $versions = array();
        while ($versio = $stm->fetch(\PDO::FETCH_ASSOC)) {
            $versions[$comptador] = $versio;
            $comptador = $comptador + 1;
        }

        return $versions;
    }

    public function getHistorialConcret($id)
    {
        $query = "select uc.*, concat(u.nom, ' ', u.cognom) as creador, c.nom as nomAntic 
        from usuari_categoria_edita uc 
        left join usuari u on u.id = uc.id_usuari 
        left join categoria c on c.id = uc.id_categoria 
        where uc.id_categoria = :id
        order by uc.data_edicio desc;";
        $stm = $this->sql->prepare($query);
        $result = $stm->execute([':id' => $id]);

        $comptador = 0;
        $versions = array();
        while ($versio = $stm->fetch(\PDO::FETCH_ASSOC)) {
            $versions[$comptador] = $versio;
            $comptador = $comptador + 1;
        }

        return $versions;
    }
}