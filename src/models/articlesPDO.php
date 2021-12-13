<?php
/**
 * Classe que gestiona la gestio dels articles
 * **/

/**
 * Article PDO: Classe que gestiona la gestio d'articles
 * 
 * Sera la classe que servira per esborrar, crear, modificar els articles de l'aplicació
 * **/
class ArticlesPDO extends ModelPDO
{
    private $taula = "article";

    /**
     * gettotalregistres: Mostra el numero total de articles
     **/
 public function gettotalregistres()
    {
        $article = parent::totalregistres($this->taula);

        return $article;
    }

    /**
     * getllistat: Mostra tots els articles
     **/
    public function getllistat()
    {
        $articles = parent::llistat($this->taula);

        return $articles;
    }

    /**
     * getllistatPublic: Mostra tots els articles
     **/
    public function getllistatPublic()
    {
        $query = "select a.id,a.titol,a.publicat,c.nom as categoria,concat(u.nom, ' ', u.cognom) as creador,a.data_creacio 
        from article a left join usuari u on a.id_usuari = u.id 
        left join categoria c on a.id_categoria = c.id;";
        $stm = $this->sql->prepare($query);
        $result = $stm->execute([]);
 
        $registres = array();
        while ($registre = $stm->fetch(\PDO::FETCH_ASSOC)) {
            $registres[$registre["id"]] = $registre;
        }
  
        return $registres;
    }

    /**
     * getllistatPortada: Mostra tots els articles
     * 
     * @param limit limit d'articles que es veuran a la portada
     **/
    public function getllistatPortada($limit)
    {
        if ($limit == 0) {
            $query = "select a.*, (select data_edicio 
            from usuari_article_edita 
            where id_article = a.id 
            order by data_edicio desc limit 1) as dataEdicio, c.nom as categoria 
            from article a 
            left join categoria c on a.id_categoria = c.id 
            where a.publicat = 1 
            order by dataEdicio desc;";
        } else {
            $query = "select a.*, (select data_edicio 
            from usuari_article_edita 
            where id_article = a.id 
            order by data_edicio desc limit 1) as dataEdicio, c.nom as categoria 
            from article a 
            left join categoria c on a.id_categoria = c.id 
            where a.publicat = 1 
            order by dataEdicio desc limit $limit;";
        }
        $stm = $this->sql->prepare($query);
        $result = $stm->execute([]);
 
        $registres = array();
        while ($registre = $stm->fetch(\PDO::FETCH_ASSOC)) {
            $registres[$registre["id"]] = $registre;
        }
  
        return $registres;
    }

    /**
     * getllistatFavorits: Mostra tots els articles favorits de l'usuari actualment logat
     * 
     * @param nomUsuari nom de l'usuari logat
     **/
    public function getllistatFavorits($nomUsuari)
    {
        $query = "select id from usuari where username = :usuari;";
        $stm = $this->sql->prepare($query);
        $result = $stm->execute([':usuari' => $nomUsuari]);

        $usuaris = $stm->fetch(\PDO::FETCH_ASSOC);

        $query = "select a.id, a.titol, a.contingut, a.publicat, a.imatge, (select data_edicio 
        from usuari_article_edita 
        where id_article = a.id 
        order by data_edicio desc limit 1) as dataEdicio, c.nom as categoria 
        from article a 
        inner join articles_favorits af on af.id_article = a.id
        left join categoria c on a.id_categoria = c.id 
        where a.publicat = 1 and af.id_usuari = :idUsuari
        order by dataEdicio desc;";

        $stm = $this->sql->prepare($query);
        $result = $stm->execute([':idUsuari' => $usuaris["id"]]);
 
        $comptador = 0;
        $registres = array();
        while ($registre = $stm->fetch(\PDO::FETCH_ASSOC)) {
            $registres[$comptador] = $registre;
            $comptador = $comptador + 1;
        }
  
        return $registres;
    }

    public function getllistatTotsFavorits()
    {
        $query = "select * from articles_favorits;";
        $stm = $this->sql->prepare($query);
        $result = $stm->execute([]);
 
        $comptador = 0;
        $registres = array();
        while ($registre = $stm->fetch(\PDO::FETCH_ASSOC)) {
            $registres[$comptador] = $registre;
            $comptador = $comptador + 1;
        }
  
        return $registres;
    }

    public function addFavorit($idArticle, $nomUsuari)
    {
        $query = "select id from usuari where username = :usuari;";
        $stm = $this->sql->prepare($query);
        $result = $stm->execute([':usuari' => $nomUsuari]);

        $usuaris = $stm->fetch(\PDO::FETCH_ASSOC);

        $query = "insert into articles_favorits values (:idArticle, :idUsuari);";
        $stm = $this->sql->prepare($query);
        $result = $stm->execute([':idArticle' => $idArticle, ':idUsuari' => $usuaris["id"]]);

        if ($stm->errorCode() !== '00000') {
            $err = $stm->errorInfo();
            $code = $stm->errorCode();
            die("Error.   {$err[0]} - {$err[1]}\n{$err[2]} $query");
        }

        return $stm->fetch(\PDO::FETCH_ASSOC);
    }

    public function deleteFavorit($idArticle, $nomUsuari)
    {
        $query = "select id from usuari where username = :usuari;";
        $stm = $this->sql->prepare($query);
        $result = $stm->execute([':usuari' => $nomUsuari]);

        $usuaris = $stm->fetch(\PDO::FETCH_ASSOC);

        $query = "delete from articles_favorits where id_article = :idArticle and id_usuari = :idUsuari;";
        $stm = $this->sql->prepare($query);
        $result = $stm->execute([':idArticle' => $idArticle, ':idUsuari' => $usuaris["id"]]);

        if ($stm->errorCode() !== '00000') {
            $err = $stm->errorInfo();
            $code = $stm->errorCode();
            die("Error.   {$err[0]} - {$err[1]}\n{$err[2]} $query");
        }

        return $stm->fetch(\PDO::FETCH_ASSOC);
    }

    public function isFavorit($idArticle, $nomUsuari)
    {
        $query = "select id from usuari where username = :usuari;";
        $stm = $this->sql->prepare($query);
        $result = $stm->execute([':usuari' => $nomUsuari]);

        $usuaris = $stm->fetch(\PDO::FETCH_ASSOC);

        $query = "select * 
        from articles_favorits 
        where id_article = :idArticle and id_usuari = :idUsuari;";
        $stm = $this->sql->prepare($query);
        $result = $stm->execute([':idArticle' => $idArticle, ':idUsuari' => $usuaris["id"]]);

        $favorit = $stm->fetch(\PDO::FETCH_ASSOC);

        $exists = false;
        if (isset($favorit["id_article"])) {
            $exists = true;
        }        

        return $exists;
    }

    public function getArrayValorsPredefinits($usuariLogat)
    {
        $arrayPredefinit = array('Nou Article', '<h1 style="text-align: center;">Article de prova</h1>	',0,$usuariLogat);;

        return $arrayPredefinit;
    }
      /**
     * delete: esborra un article amb l'id especificat per parametre de la base de dades
     * @param id id de l'article a borrar
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
    public function show($id)
    {
        $taula2 = $this->taula;

        $query = "select a.titol,a.publicat,a.contingut,concat(u.nom, ' ', u.cognom) as creador,a.data_creacio from article a left join usuari u on a.id_usuari = u.id where a.id = :id LIMIT 1;";
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
    public function update($id, $titol, $contingut, $publicat, $categoria, $creador)
    {
        $query = "update article set titol = :titol, contingut = :contingut,publicat = :publicat,id_categoria = :categoria where id = :id;";
        $stm = $this->sql->prepare($query);
        $result = $stm->execute([':id' => $id, ':titol' => $titol,':contingut' => $contingut,':publicat' => $publicat,':categoria' => $categoria]);

        $query = "select id from usuari where username = :usuari;";
        $stm = $this->sql->prepare($query);
        $result = $stm->execute([':usuari' => $creador]);

        $usuaris = $stm->fetch(\PDO::FETCH_ASSOC);

        $dataActual = new DateTime();

        $query = "select id, imatge from article where titol = :nomArticle;";
        $stm = $this->sql->prepare($query);
        $result = $stm->execute([':nomArticle' => $titol]);

        $articles = $stm->fetch(\PDO::FETCH_ASSOC);

        $query = "insert into usuari_article_edita (id_usuari, id_article, data_edicio, titol, contingut, imatge) values (:creador, :article, :dataEdicio, :titol, :contingut, :imatge);";
        $stm = $this->sql->prepare($query);
        $result = $stm->execute([':creador' => $usuaris["id"], ':article' => $articles["id"], ':dataEdicio' => $dataActual->format("Y-n-j H:i:s "), ':titol' => $titol, ':contingut' => $contingut, ':imatge' => $articles["imatge"]]);


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
    public function add($titol,$contingut,$publicat,$categoria,$creador)
    {
        $query = "select id from usuari where username = :usuari;";
        $stm = $this->sql->prepare($query);
        $result = $stm->execute([':usuari' => $creador]);

        $usuaris = $stm->fetch(\PDO::FETCH_ASSOC);

        $dataActual = new DateTime();

        $query = "insert into article (titol,contingut,publicat,id_categoria,id_usuari,data_creacio) values (:titol,:contingut,:publicat,:categoria,:creador,:datacreacio);";
        $stm = $this->sql->prepare($query);
        $result = $stm->execute([':titol' => $titol,':contingut' => $contingut, ':publicat' => $publicat,':categoria' => $categoria,':creador' => $usuaris["id"],':datacreacio' => $dataActual->format("Y-n-j H:i:s")]);

        $query = "select id, imatge from article where titol = :nomArticle;";
        $stm = $this->sql->prepare($query);
        $result = $stm->execute([':nomArticle' => $titol]);

        $articles = $stm->fetch(\PDO::FETCH_ASSOC);

        $query = "insert into usuari_article_edita (id_usuari, id_article, data_edicio, titol, contingut, imatge) values (:creador, :article, :dataEdicio, :titol, :contingut, :imatge);";
        $stm = $this->sql->prepare($query);
        $result = $stm->execute([':creador' => $usuaris["id"], ':article' => $articles["id"], ':dataEdicio' => $dataActual->format("Y-n-j H:i:s"), ':titol' => $titol, ':contingut' => $contingut, ':imatge' => $articles["imatge"]]);

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
        $query = "select ua.*, concat(u.nom, ' ', u.cognom) as creador, a.id_categoria, a.publicat 
        from usuari_article_edita ua 
        left join usuari u on u.id = ua.id_usuari 
        left join article a on a.id = ua.id_article
        order by ua.data_edicio desc;";
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
        $query = "select ua.*, concat(u.nom, ' ', u.cognom) as creador, a.id_categoria, a.publicat 
        from usuari_article_edita ua 
        left join usuari u on u.id = ua.id_usuari 
        left join article a on a.id = ua.id_article 
        where ua.id_article = :id
        order by ua.data_edicio desc;";
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