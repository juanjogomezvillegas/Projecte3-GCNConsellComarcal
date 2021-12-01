CREATE OR REPLACE DATABASE gcnaltemporda_cat;

use gcnaltemporda_cat;

CREATE OR REPLACE TABLE usuari (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(150),
    cognom VARCHAR(150),
    username VARCHAR(150) UNIQUE,
    contrasenya VARCHAR(50),
    rol VARCHAR(150) DEFAULT 'Usuari',
    email VARCHAR(150), 
    telefon VARCHAR(15)
);

CREATE TABLE categoria(
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(150)
);

CREATE TABLE article (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    id_usuari BIGINT UNSIGNED,
    data_creacio DATE,
    titol VARCHAR(150),
    contingut VARCHAR(5000),
    id_categoria BIGINT UNSIGNED,
    CONSTRAINT fk_id_usuari
    FOREIGN KEY (id_usuari)
    REFERENCES usuari (id)
    ON UPDATE CASCADE
    ON DELETE CASCADE,
    CONSTRAINT fk_id_categoria
    FOREIGN KEY (id_categoria)
    REFERENCES categoria (id)
    ON UPDATE CASCADE
    ON DELETE CASCADE
);

INSERT INTO usuari VALUES (1,'admin','admin','admin','1234','Administrador','admin@cendrassos.net','111 111 111');
INSERT INTO usuari VALUES (2,'gestor','gestor','gestor','1234','Gestor','gestor@cendrassos.net','222 222 222');
INSERT INTO usuari VALUES (3,'usuari','usuari','usuari','1234','Usuari','usuari@cendrassos.net','333 333 333');
INSERT INTO article (id,id_usuari,titol,contingut) VALUES (1,2,'Manos Ariba','hola ke ase');