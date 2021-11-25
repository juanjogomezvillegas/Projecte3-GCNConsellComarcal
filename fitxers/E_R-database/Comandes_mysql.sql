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

CREATE TABLE article (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    id_usuari BIGINT UNSIGNED,
    data_creacio DATE,
    titulo VARCHAR(150),
    contingut VARCHAR(150),
    categoria VARCHAR(150),
    foreign key (id_usuari) references usuari(id)
);

INSERT INTO usuari VALUES (1,'admin','admin','admin','1234','Administrador','admin@cendrassos.net','111 111 111');
INSERT INTO usuari VALUES (2,'gestor','gestor','gestor','1234','Gestor','gestor@cendrassos.net','222 222 222');
INSERT INTO usuari VALUES (3,'usuari','usuari','usuari','1234','Usuari','usuari@cendrassos.net','333 333 333');