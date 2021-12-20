<?php

/*Crea totes les taules de la base de dades que necessita l'aplicació per funcionar*/
$connexio->query(
    "CREATE TABLE usuari (
    id BIGINT AUTO_INCREMENT,
    nom VARCHAR(150),
    cognom VARCHAR(150),
    username VARCHAR(150) UNIQUE,
    contrasenya VARCHAR(150),
    rol VARCHAR(150) DEFAULT 'Usuari',
    email VARCHAR(150), 
    telefon VARCHAR(15),
    imatge VARCHAR(100) DEFAULT '/img/users/userporfile.png', 
    PRIMARY KEY (id)
);"
);

$connexio->query(
    "CREATE TABLE categoria (
    id BIGINT AUTO_INCREMENT,
    nom VARCHAR(150),
    id_usuari BIGINT, 
    data_creacio TIMESTAMP, 
    CONSTRAINT fk_usuariCat FOREIGN KEY (id_usuari) REFERENCES usuari(id) ON UPDATE CASCADE ON DELETE CASCADE, 
    PRIMARY KEY (id)
);"
);

$connexio->query(
    "CREATE TABLE article (
    id BIGINT AUTO_INCREMENT,
    titol VARCHAR(150),
    contingut TEXT,
    publicat INT(1) DEFAULT 0, 
    imatge VARCHAR(100) DEFAULT 'img/articles/logo2.png', 
    id_categoria BIGINT,
    id_usuari BIGINT, 
    data_creacio TIMESTAMP, 
    CONSTRAINT fk_categoriaArt FOREIGN KEY (id_categoria) REFERENCES categoria(id) ON UPDATE CASCADE ON DELETE CASCADE, 
    CONSTRAINT fk_usuariArt FOREIGN KEY (id_usuari) REFERENCES usuari(id) ON UPDATE CASCADE ON DELETE CASCADE, 
    PRIMARY KEY (id)
);"
);

$connexio->query(
    "CREATE TABLE usuari_categoria_edita (
    id_usuari BIGINT,
    id_categoria BIGINT, 
    data_edicio TIMESTAMP, 
    nom VARCHAR(150),
    CONSTRAINT fk_usuariEditaCat FOREIGN KEY (id_usuari) REFERENCES usuari(id) ON UPDATE CASCADE ON DELETE CASCADE, 
    CONSTRAINT fk_categoriaEditaUser FOREIGN KEY (id_categoria) REFERENCES categoria(id) ON UPDATE CASCADE ON DELETE CASCADE, 
    PRIMARY KEY (id_usuari, id_categoria, data_edicio)
);"
);

$connexio->query(
    "CREATE TABLE usuari_article_edita (
    id_usuari BIGINT,
    id_article BIGINT, 
    data_edicio TIMESTAMP, 
    titol VARCHAR(150),
    contingut TEXT,
    imatge VARCHAR(100) DEFAULT 'img/articles/logo2.png', 
    CONSTRAINT fk_usuariEditaArt FOREIGN KEY (id_usuari) REFERENCES usuari(id) ON UPDATE CASCADE ON DELETE CASCADE, 
    CONSTRAINT fk_articleEditaUser FOREIGN KEY (id_article) REFERENCES article(id) ON UPDATE CASCADE ON DELETE CASCADE, 
    PRIMARY KEY (id_usuari, id_article, data_edicio)
);"
);

$connexio->query(
    "CREATE TABLE document (
    id BIGINT AUTO_INCREMENT,
    enllac VARCHAR(255),
    id_article BIGINT, 
    CONSTRAINT fk_articleDocument FOREIGN KEY (id_article) REFERENCES article(id) ON UPDATE CASCADE ON DELETE CASCADE, 
    PRIMARY KEY (id)
);"
);

$connexio->query(
    "CREATE TABLE contacte (
    id BIGINT AUTO_INCREMENT,
    nom VARCHAR(200),
    email VARCHAR(200),
    telefon VARCHAR(11),
    missatge TEXT, 
    id_usuari BIGINT, 
    data_enviament TIMESTAMP, 
    CONSTRAINT fk_usuariMsg FOREIGN KEY (id_usuari) REFERENCES usuari(id) ON UPDATE CASCADE ON DELETE CASCADE, 
    PRIMARY KEY (id)
);"
);

$connexio->query(
    "CREATE TABLE slider (
    id BIGINT AUTO_INCREMENT,
    imatge VARCHAR(200) DEFAULT 'img/slider/1.jpg',
    nom VARCHAR(200),
    PRIMARY KEY (id)
);"
);

$connexio->query(
    "CREATE TABLE articles_favorits (
    id_article BIGINT, 
    id_usuari BIGINT, 
    CONSTRAINT fk_usuari_favorit FOREIGN KEY (id_usuari) REFERENCES usuari(id) ON UPDATE CASCADE ON DELETE CASCADE, 
    CONSTRAINT fk_article_favorit FOREIGN KEY (id_article) REFERENCES article(id) ON UPDATE CASCADE ON DELETE CASCADE, 
    PRIMARY KEY (id_article, id_usuari)
);"
);

$connexio->query(
    "CREATE TABLE comentaris_article (
    id BIGINT AUTO_INCREMENT,
    missatge VARCHAR(200),
    id_article BIGINT,
    id_usuari BIGINT, 
    data_enviament TIMESTAMP, 
    CONSTRAINT fk_articleComentari FOREIGN KEY (id_article) REFERENCES article(id) ON UPDATE CASCADE ON DELETE CASCADE, 
    CONSTRAINT fk_usuariComentari FOREIGN KEY (id_usuari) REFERENCES usuari(id) ON UPDATE CASCADE ON DELETE CASCADE, 
    PRIMARY KEY (id)
);"
);
