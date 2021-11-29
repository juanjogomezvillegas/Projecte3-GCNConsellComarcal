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
    private $taula = "usuari";


    /**
     * getllistat: Mostra tots els usuaris
     **/
    public function getllistat()
    {
        $usuaris = parent::llistat($this->taula);

        return $usuaris;
    }
    
    public function gettotalregistres()
    {
        $usuaris1 = parent::totalregistres($this->taula);

        return $usuaris1;
    }

    /**
     * islogin: Comrpova si un usuari i un password especificats per parametre existeixen a la base de dades
     * @param usuari usuari logat
     * @param password password logat
     **/
    public function islogin($usuari, $password)
    {
        $taula2 = $this->taula;

        $query = "select username,contrasenya from $taula2 where username = :usuari and contrasenya = :pass";
        $stm = $this->sql->prepare($query);
        $result = $stm->execute([':usuari' => $usuari,':pass' => $password]);

        $logat = $stm->fetch(\PDO::FETCH_ASSOC);

        if (isset($logat["username"]) && isset($logat["contrasenya"])) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * get: Consulta les dades d'un usuari registrat amb l'id especificat per parametre a la base de dades
     * @param id id de l'usuari a consultar
     **/
    public function get($id)
    {
        $taula2 = $this->taula;

        $query = "select * from $taula2 where id = :id;";
        $stm = $this->sql->prepare($query);
        $result = $stm->execute([':id' => $id]);

        if ($stm->errorCode() !== '00000') {
            $err = $stm->errorInfo();
            $code = $stm->errorCode();
            die("Error.   {$err[0]} - {$err[1]}\n{$err[2]} $query");
        }

        return $stm->fetch(\PDO::FETCH_ASSOC);
    }

    /**
     * add: afegira un usuari a la base de dades
     * @param nom nom de l'usuari
     * @param cognom cognom de l'usuari
     * @param username nom que fara servir l'usuari per fer login
     * @param contrasenya password que fara servir l'usuari per fer login
     * @param rol rol de l'usuari
     * @param email correu electronic de l'usuari
     * @param telefon telefon de l'usuari
     **/
    public function add($nom, $cognom, $username, $contrasenya, $rol, $email, $telefon)
    {
        $taula2 = $this->taula;

        $query = "insert into $taula2 (nom,cognom,username,contrasenya,rol,email,telefon) values (:nom,:cognom,:username,:pass,:rol,:email,:telefon);";
        $stm = $this->sql->prepare($query);
        $result = $stm->execute([':nom' => $nom, ':cognom' => $cognom,':username' => $username,':pass' => $contrasenya,':rol' => $rol,':email' => $email,':telefon' => $telefon]);

        if ($stm->errorCode() !== '00000') {
            $err = $stm->errorInfo();
            $code = $stm->errorCode();
            die("Error.   {$err[0]} - {$err[1]}\n{$err[2]} $query");
        }

        return $stm->fetch(\PDO::FETCH_ASSOC);
    }

    /**
     * delete: esborrara un usuari amb l'id especificat per parametre de la base de dades
     * @param id id de l'usuari a borrar
     **/
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

    /**
     * update: modificara els dades d'usuari registrat a la base de dades
     * @param id id de l'usuari a modificar
     * @param nom nom de l'usuari
     * @param cognom cognom de l'usuari
     * @param username nom que fara servir l'usuari per fer login
     * @param rol rol de l'usuari
     * @param email correu electronic de l'usuari
     * @param telefon telefon de l'usuari
     **/
    public function update($id, $nom, $cognom, $username, $rol, $email, $telefon)
    {
        $taula2 = $this->taula;

        $query = "update $taula2 set nom = :nom,cognom = :cognom,username = :username,contrasenya = :pass,rol = :rol,email = :email,telefon = :telefon where id = :id;";
        $stm = $this->sql->prepare($query);
        $result = $stm->execute([':id' => $id,':nom' => $nom, ':cognom' => $cognom,':username' => $username,':pass' => $contrasenya,':rol' => $rol,':email' => $email,':telefon' => $telefon]);

        if ($stm->errorCode() !== '00000') {
            $err = $stm->errorInfo();
            $code = $stm->errorCode();
            die("Error.   {$err[0]} - {$err[1]}\n{$err[2]} $query");
        }

        return $stm->fetch(\PDO::FETCH_ASSOC);
    }
}