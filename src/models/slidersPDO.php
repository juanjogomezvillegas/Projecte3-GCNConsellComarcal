<?php

/**
 * Classe que gestiona la gestio d'usuaris
 * **/

/**
 * UsuarisPDO: Classe que gestiona la gestio d'usuaris
 *
 * Sera la classe que servira per esborrar, crear, modificar els usuaris de l'aplicació
 * **/
class SlidersPDO extends ModelPDO
{
    private $taula = "slider";

      /**
       * getllistat: Mostra tots els sliders que hi ha
       **/
    public function getllistat()
    {
        $sliders = parent::llistat($this->taula);

        return $sliders;
    }

    /**
     * get: Consulta les dades d'un usuari registrat amb l'id especificat per parametre a la base de dades
     *
     * @param nom nom de l'usuari a consultar
     **/
    public function get($nom)
    {
        $taula2 = $this->taula;

        $query = "select * from $taula2 where username = :id;";
        $stm = $this->sql->prepare($query);
        $result = $stm->execute([':id' => $nom]);

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
    public function add()
    {
        $taula2 = $this->taula;

        $query = "insert into $taula2 (nom,imatge,posicio) VALUES ('asdf','asdf','2');";
        $stm = $this->sql->prepare($query);
        $result = $stm->execute();

        return $stm->fetch(\PDO::FETCH_ASSOC);
    }
}
