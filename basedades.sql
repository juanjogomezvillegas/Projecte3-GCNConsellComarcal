-- Adminer 4.8.1 MySQL 5.5.5-10.5.11-MariaDB-1 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP DATABASE IF EXISTS `gcnaltemporda_cat`;
CREATE DATABASE `gcnaltemporda_cat` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `gcnaltemporda_cat`;

DROP TABLE IF EXISTS `article`;
CREATE TABLE `article` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `titol` varchar(150) DEFAULT NULL,
  `contingut` text DEFAULT NULL,
  `publicat` int(1) DEFAULT 0,
  `imatge` varchar(100) DEFAULT 'img/articles/logo2.png',
  `id_categoria` bigint(20) DEFAULT NULL,
  `id_usuari` bigint(20) DEFAULT NULL,
  `data_creacio` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `fk_categoriaArt` (`id_categoria`),
  KEY `fk_usuariArt` (`id_usuari`),
  CONSTRAINT `fk_categoriaArt` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_usuariArt` FOREIGN KEY (`id_usuari`) REFERENCES `usuari` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `article` (`id`, `titol`, `contingut`, `publicat`, `imatge`, `id_categoria`, `id_usuari`, `data_creacio`) VALUES
(1,	'El Consell Comarcal dona suport al dret a morir dignament',	'<p style=\"text-align: justify;\">En el darrer ple del mes d&rsquo;octubre, el Consell Comarcal va aprovar per unanimitat una moci&oacute; de suport al dret a morir dignament. Aquesta moci&oacute; vol reafirmar la posici&oacute; de l&rsquo;ens tot afirmant que &laquo;la llibertat de la persona no s&rsquo;ha de perdre en cap moment de la vida, ni tampoc en el proc&eacute;s final que ens porta a la mort&raquo;, alhora que pren el comprom&iacute;s de donar suport, defensar i divulgar el dret de les persones a ser assistides al final de la vida.</p>\r\n<p style=\"text-align: justify;\">El text aprovat tamb&eacute; &eacute;s una declaraci&oacute; a favor de desplegar amb rapidesa els mecanismes per fer possible l&rsquo;eutan&agrave;sia en aquells casos que ho requereixin i que es promocioni el Document de Voluntats Anticipades (DVA). &Eacute;s un document en el qual l&rsquo;usuari &ndash;qualsevol ciutad&agrave;&ndash; pot explicar per endavant quin tractament m&egrave;dic vol rebre. Es pot redactar fins i tot quan no es pateix cap malaltia.</p>\r\n<p style=\"text-align: justify;\">En la seva exposici&oacute;, el text detalla articulats com la Declaraci&oacute; Universal dels Drets Humans, la constituci&oacute; espanyola on es fan valdre alguns drets com &laquo;la dignitat de la persona i el lliure desenvolupament de la seva personalitat&raquo; i l&rsquo;Estatut d&rsquo;Autonomia de 2006 que ja &eacute;s m&eacute;s expl&iacute;cit en proclamar que &laquo;totes les persones tenen el dret de rebre un tractament adequat al dolor, a cures pal&middot;liatives integrals i a viure amb dignitat el proc&eacute;s de llur mort&rdquo;.</p>\r\n<p style=\"text-align: justify;\">El vicepresident del Consell Comarcal, Josep Maria Bernils, assenyala que &ldquo;amb aquest acord, la nostra instituci&oacute; expressa de forma clara el seu suport a l&rsquo;Associaci&oacute; DMD-Cat, que disposa d&rsquo;un nucli molt actiu a l&rsquo;Alt Empord&agrave;, i a totes les accions que promogui per fer difusi&oacute; de dret a morir dignament, que es formalitzaran a trav&eacute;s d&rsquo;un conveni de col&middot;laboraci&oacute;&rdquo;.</p>',	1,	'img/articles/img1.jpg',	3,	1,	'2021-12-21 21:57:56'),
(2,	'El Consell Comarcal aprova un pressupost',	'<p style=\"text-align: justify;\">El Consell Comarcal de l&rsquo;Alt Empord&agrave; ha aprovat inicialment el pressupost per a l\'exercici de l\'any vinent que puja a un total de 33.531.347,94 euros., que presenta un decreixement del pressupost de l&rsquo;exercici anterior (34,6 MEUR) a causa de la finalitzaci&oacute; dels projectes subvencionats pel FEDER i la reducci&oacute; dels contractes de suport als municipis que finan&ccedil;a el SOC. El pressupost va ser aprovat per unanimitat de tots els grups comarcals.</p>\r\n<p style=\"text-align: justify;\">El cap&iacute;tol d&rsquo;inversions contempla tot un seguit d&rsquo;actuacions que venen derivades pel pressupost del 2021. En concret, l&rsquo;any vinent es culminar&agrave; la construcci&oacute; de la nova fase del Centre de Tractament de Residus (CTR) i el Centre de Protecci&oacute; d&rsquo;Animals aix&iacute; com el Programa d&rsquo;Especialitzaci&oacute; i Competitivitat Territorial (PECT) en l&rsquo;&agrave;mbit de la pedra seca. Tot i que el pressupost no ho reflecteix, l&rsquo;ens comarcal aspira a fer realitat un centre de producci&oacute; d&rsquo;energia fotovoltaica al CTR, finan&ccedil;at amb els fons Next Generation, que permetr&agrave; autoabastir totes les instal&middot;lacions. Tamb&eacute; es contempla incorporar al llarg del proper exercici el servei de gesti&oacute; d&rsquo;aig&uuml;es residuals, transferit per l&rsquo;ACA, i s&rsquo;est&agrave; treballat en un nou programa d&rsquo;actuacions de promoci&oacute; tur&iacute;stica.</p>\r\n<p style=\"text-align: justify;\">Com va alertar el vicepresident Josep Maria Bernils, en la seva explicaci&oacute; davant el ple del Consell, els pressupostos de la Generalitat condicionen actualment els de l&rsquo;ens comarcal, ja que els contractes programa (amb els que funcionen &agrave;rees com Joventut i Benestar Social) no estan aprovats, tot i el comprom&iacute;s que tinguin la llum verda en les properes setmanes i que, en alguns apartats, s&rsquo;espera que milloraran el finan&ccedil;ament dels serveis.</p>',	1,	'img/articles/img2.jpg',	1,	1,	'2021-12-21 21:45:37'),
(3,	'L&#39;Organització Comarcal',	'<p style=\"text-align: justify;\">El govern i l\'administraci&oacute; de la comarca corresponen al Consell comarcal. El territori de la comarca &eacute;s l\'&agrave;mbit en el qual el Consell comarcal exerceix les seves compet&egrave;ncies, i &eacute;s definit per l\'agrupaci&oacute; dels termes municipals que la integren.</p>\r\n<p style=\"text-align: justify;\">El consell comarcal &eacute;s constitu&iuml;t per regidors dels municipis que formen la demarcaci&oacute;, elegits d\'acord amb els mecanismes establerts per la llei, segons el nombre total de membres que correspongui a cada Consell comarcal i d\'acord amb els resultats electorals aconseguits en les eleccions municipals per \"cada partit, coalici&oacute;, federaci&oacute; o agrupaci&oacute; d\'electors\".</p>\r\n<p style=\"text-align: justify;\">El nombre de membres del Consell comarcal es determina segons els residents de la comarca i d\'acord amb l\'escala seg&uuml;ent: &middot;</p>\r\n<ul style=\"text-align: justify;\">\r\n<li>Fins a 50.000 residents: 19.</li>\r\n<li>De 50.001 a 100.000: 25.</li>\r\n<li>De 100.001 a 500.000: 33.</li>\r\n<li>De 500.001 endavant: 39.</li>\r\n</ul>\r\n<p style=\"text-align: justify;\">Els &ograve;rgans del consell comarcal s&oacute;n: el ple, el President i la comissi&oacute; especial de comptes. Tamb&eacute; forma part de l\'organitzaci&oacute; comarcal el gerent, que t&eacute; funcions executives. De tots aquests &ograve;rgans, la llei en determina minuciosament quines s&oacute;n les atribucions i les funcions que tenen.</p>\r\n<p style=\"text-align: justify;\">En la sessi&oacute; constitutiva del consell comarcal s\'elegeix el President per votaci&oacute; de tots els membres que el componen. Qualsevol membre del Consell pot ser candidat a president. Ser&agrave; elegit el qui hagi obtingut la majoria absoluta en la primera votaci&oacute; o la simple en la segona. En el cas d\'empat entre dos candidats o m&eacute;s es procedeix a una tercera votaci&oacute;, i, si l\'empat es d&oacute;na novament, ser&agrave; elegit president el candidat de la llista amb m&eacute;s consellers. El President pot ser destitu&iuml;t per moci&oacute; de censura d\'acord \"amb el que estableix la legislaci&oacute; de r&egrave;gim local\".</p>\r\n<p style=\"text-align: justify;\">El president ha de nomenar, entre els consellers, un o m&eacute;s vice-presidents que l\'han de substituir en cas de vacant, abs&egrave;ncia o impediment, i en els quals pot delegar les seves atribucions.</p>\r\n<p style=\"text-align: justify;\">La durada del mandat dels membres del consell comarcal coincideix amb el de les corporacions municipals. La p&egrave;rdua de la condici&oacute; de regidor determina tamb&eacute; la p&egrave;rdua de la condici&oacute; de membre del Consell comarcal.</p>\r\n<p style=\"text-align: justify;\">El ple del consell &eacute;s constitu&iuml;t pel president i els consellers, i la comissi&oacute; especial de comptes &eacute;s integrada pel nombre de consellers que determini el ple. Ha de comprendre almenys un membre de cada grup pol&iacute;tic representat en el consell comarcal.</p>\r\n<p style=\"text-align: justify;\">El consell comarcal pot complementar l\'organitzaci&oacute; b&agrave;sica en els termes que preveu la legislaci&oacute; de r&egrave;gim local, o b&eacute; mitjan&ccedil;ant acord del ple o amb l\'aprovaci&oacute; del reglament org&agrave;nic comarcal corresponent.</p>',	1,	'img/articles/logo2.png',	2,	1,	'2021-12-21 21:54:32');

DROP TABLE IF EXISTS `articles_favorits`;
CREATE TABLE `articles_favorits` (
  `id_article` bigint(20) NOT NULL,
  `id_usuari` bigint(20) NOT NULL,
  PRIMARY KEY (`id_article`,`id_usuari`),
  KEY `fk_usuari_favorit` (`id_usuari`),
  CONSTRAINT `fk_article_favorit` FOREIGN KEY (`id_article`) REFERENCES `article` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_usuari_favorit` FOREIGN KEY (`id_usuari`) REFERENCES `usuari` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `categoria`;
CREATE TABLE `categoria` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nom` varchar(150) DEFAULT NULL,
  `id_usuari` bigint(20) DEFAULT NULL,
  `data_creacio` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `fk_usuariCat` (`id_usuari`),
  CONSTRAINT `fk_usuariCat` FOREIGN KEY (`id_usuari`) REFERENCES `usuari` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `categoria` (`id`, `nom`, `id_usuari`, `data_creacio`) VALUES
(1,	'Tramits',	2,	'2021-12-21 10:25:11'),
(2,	'Ambits',	2,	'2021-12-21 10:25:11'),
(3,	'Salut',	2,	'2021-12-21 10:25:11'),
(4,	'Ocupació',	2,	'2021-12-21 10:25:11'),
(5,	'Formació',	2,	'2021-12-21 10:25:11'),
(6,	'Cites Previes',	2,	'2021-12-21 10:25:11'),
(7,	'Habitatge',	2,	'2021-12-21 10:25:11'),
(8,	'Noves Tecnologies',	2,	'2021-12-21 10:25:11');

DROP TABLE IF EXISTS `comentaris_article`;
CREATE TABLE `comentaris_article` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `missatge` varchar(200) DEFAULT NULL,
  `id_article` bigint(20) DEFAULT NULL,
  `id_usuari` bigint(20) DEFAULT NULL,
  `data_enviament` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `fk_articleComentari` (`id_article`),
  KEY `fk_usuariComentari` (`id_usuari`),
  CONSTRAINT `fk_articleComentari` FOREIGN KEY (`id_article`) REFERENCES `article` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_usuariComentari` FOREIGN KEY (`id_usuari`) REFERENCES `usuari` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `comentaris_article` (`id`, `missatge`, `id_article`, `id_usuari`, `data_enviament`) VALUES
(1,	'aixo es un comentari',	1,	1,	'2021-12-21 21:35:02'),
(2,	'aixo es un comentari de prova',	3,	1,	'2021-12-21 21:55:01'),
(3,	'aixo es un comentari de prova',	3,	3,	'2021-12-21 21:59:08');

DROP TABLE IF EXISTS `contacte`;
CREATE TABLE `contacte` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nom` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `telefon` varchar(11) DEFAULT NULL,
  `missatge` text DEFAULT NULL,
  `id_usuari` bigint(20) DEFAULT NULL,
  `data_enviament` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `fk_usuariMsg` (`id_usuari`),
  CONSTRAINT `fk_usuariMsg` FOREIGN KEY (`id_usuari`) REFERENCES `usuari` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `document`;
CREATE TABLE `document` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `enllac` varchar(255) DEFAULT NULL,
  `id_article` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_articleDocument` (`id_article`),
  CONSTRAINT `fk_articleDocument` FOREIGN KEY (`id_article`) REFERENCES `article` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `document` (`id`, `enllac`, `id_article`) VALUES
(1,	'DAW-M12-Projecte3-Informe_autoavaluacio-Juan_Jose_Gomez_Villegas.pdf',	1),
(2,	'Gestio-de-Imatges-amb-Docker-3_Gomez-Villegas_Juan-Jose.pdf',	3),
(3,	'Gestio-de-Imatges-amb-Docker-2_Gomez-Villegas_Juan-Jose.pdf',	3);

DROP TABLE IF EXISTS `slider`;
CREATE TABLE `slider` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `imatge` varchar(200) DEFAULT NULL,
  `nom` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `slider` (`id`, `imatge`, `nom`) VALUES
(1,	'img/slider/fons1.jpg',	'imatge Slider'),
(3,	'img/slider/fons3.jpg',	'imatge Slider'),
(4,	'img/slider/fons4.jpg',	'imatge Slider');

DROP TABLE IF EXISTS `usuari`;
CREATE TABLE `usuari` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nom` varchar(150) DEFAULT NULL,
  `cognom` varchar(150) DEFAULT NULL,
  `username` varchar(150) DEFAULT NULL,
  `contrasenya` varchar(150) DEFAULT NULL,
  `rol` varchar(150) DEFAULT 'Usuari',
  `email` varchar(150) DEFAULT NULL,
  `telefon` varchar(15) DEFAULT NULL,
  `imatge` varchar(100) DEFAULT '/img/users/userporfile.png',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `usuari` (`id`, `nom`, `cognom`, `username`, `contrasenya`, `rol`, `email`, `telefon`, `imatge`) VALUES
(1,	'admin',	'admin',	'admin',	'$2y$10$sPIbIjxZg9yx3KuebAipjuN/u4.0e.q9YETRhe6uRzHhvgtGTyoYS',	'Administrador',	'admin@altemporda.cat',	'111 111 111',	'img/users/userporfile.png'),
(2,	'gestor',	'gestor',	'gestor',	'$2y$10$sPIbIjxZg9yx3KuebAipjuN/u4.0e.q9YETRhe6uRzHhvgtGTyoYS',	'Gestor',	'gestor@altemporda.cat',	'222 222 222',	'img/users/userporfile.png'),
(3,	'usuari',	'usuari',	'usuari',	'$2y$10$sPIbIjxZg9yx3KuebAipjuN/u4.0e.q9YETRhe6uRzHhvgtGTyoYS',	'Usuari',	'usuari@altemporda.cat',	'333 333 333',	'img/users/userporfile.png');

DROP TABLE IF EXISTS `usuari_article_edita`;
CREATE TABLE `usuari_article_edita` (
  `id_usuari` bigint(20) NOT NULL,
  `id_article` bigint(20) NOT NULL,
  `data_edicio` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `titol` varchar(150) DEFAULT NULL,
  `contingut` text DEFAULT NULL,
  `imatge` varchar(100) DEFAULT 'img/articles/logo2.png',
  PRIMARY KEY (`id_usuari`,`id_article`,`data_edicio`),
  KEY `fk_articleEditaUser` (`id_article`),
  CONSTRAINT `fk_articleEditaUser` FOREIGN KEY (`id_article`) REFERENCES `article` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_usuariEditaArt` FOREIGN KEY (`id_usuari`) REFERENCES `usuari` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `usuari_article_edita` (`id_usuari`, `id_article`, `data_edicio`, `titol`, `contingut`, `imatge`) VALUES
(1,	1,	'2021-12-21 21:33:50',	'El Consell Comarcal dona suport al dret a morir dignament',	'<p style=\"text-align: justify;\">En el darrer ple del mes d&rsquo;octubre, el Consell Comarcal va aprovar per unanimitat una moci&oacute; de suport al dret a morir dignament. Aquesta moci&oacute; vol reafirmar la posici&oacute; de l&rsquo;ens tot afirmant que &laquo;la llibertat de la persona no s&rsquo;ha de perdre en cap moment de la vida, ni tampoc en el proc&eacute;s final que ens porta a la mort&raquo;, alhora que pren el comprom&iacute;s de donar suport, defensar i divulgar el dret de les persones a ser assistides al final de la vida.</p>\r\n<p style=\"text-align: justify;\">El text aprovat tamb&eacute; &eacute;s una declaraci&oacute; a favor de desplegar amb rapidesa els mecanismes per fer possible l&rsquo;eutan&agrave;sia en aquells casos que ho requereixin i que es promocioni el Document de Voluntats Anticipades (DVA). &Eacute;s un document en el qual l&rsquo;usuari &ndash;qualsevol ciutad&agrave;&ndash; pot explicar per endavant quin tractament m&egrave;dic vol rebre. Es pot redactar fins i tot quan no es pateix cap malaltia.</p>\r\n<p style=\"text-align: justify;\">En la seva exposici&oacute;, el text detalla articulats com la Declaraci&oacute; Universal dels Drets Humans, la constituci&oacute; espanyola on es fan valdre alguns drets com &laquo;la dignitat de la persona i el lliure desenvolupament de la seva personalitat&raquo; i l&rsquo;Estatut d&rsquo;Autonomia de 2006 que ja &eacute;s m&eacute;s expl&iacute;cit en proclamar que &laquo;totes les persones tenen el dret de rebre un tractament adequat al dolor, a cures pal&middot;liatives integrals i a viure amb dignitat el proc&eacute;s de llur mort&rdquo;.</p>\r\n<p style=\"text-align: justify;\">El vicepresident del Consell Comarcal, Josep Maria Bernils, assenyala que &ldquo;amb aquest acord, la nostra instituci&oacute; expressa de forma clara el seu suport a l&rsquo;Associaci&oacute; DMD-Cat, que disposa d&rsquo;un nucli molt actiu a l&rsquo;Alt Empord&agrave;, i a totes les accions que promogui per fer difusi&oacute; de dret a morir dignament, que es formalitzaran a trav&eacute;s d&rsquo;un conveni de col&middot;laboraci&oacute;&rdquo;.</p>',	'img/articles/logo2.png'),
(1,	1,	'2021-12-21 21:56:11',	'El Consell Comarcal dona suport al dret a morir dignament',	'<p style=\"text-align: justify;\">En el darrer ple del mes d&rsquo;octubre, el Consell Comarcal va aprovar per unanimitat una moci&oacute; de suport al dret a morir dignament. Aquesta moci&oacute; vol reafirmar la posici&oacute; de l&rsquo;ens tot afirmant que &laquo;la llibertat de la persona no s&rsquo;ha de perdre en cap moment de la vida, ni tampoc en el proc&eacute;s final que ens porta a la mort&raquo;, alhora que pren el comprom&iacute;s de donar suport, defensar i divulgar el dret de les persones a ser assistides al final de la vida.</p>\r\n<p style=\"text-align: justify;\">El text aprovat tamb&eacute; &eacute;s una declaraci&oacute; a favor de desplegar amb rapidesa els mecanismes per fer possible l&rsquo;eutan&agrave;sia en aquells casos que ho requereixin i que es promocioni el Document de Voluntats Anticipades (DVA). &Eacute;s un document en el qual l&rsquo;usuari &ndash;qualsevol ciutad&agrave;&ndash; pot explicar per endavant quin tractament m&egrave;dic vol rebre. Es pot redactar fins i tot quan no es pateix cap malaltia.</p>\r\n<p style=\"text-align: justify;\">En la seva exposici&oacute;, el text detalla articulats com la Declaraci&oacute; Universal dels Drets Humans, la constituci&oacute; espanyola on es fan valdre alguns drets com &laquo;la dignitat de la persona i el lliure desenvolupament de la seva personalitat&raquo; i l&rsquo;Estatut d&rsquo;Autonomia de 2006 que ja &eacute;s m&eacute;s expl&iacute;cit en proclamar que &laquo;totes les persones tenen el dret de rebre un tractament adequat al dolor, a cures pal&middot;liatives integrals i a viure amb dignitat el proc&eacute;s de llur mort&rdquo;.</p>\r\n<p style=\"text-align: justify;\">El vicepresident del Consell Comarcal, Josep Maria Bernils, assenyala que &ldquo;amb aquest acord, la nostra instituci&oacute; expressa de forma clara el seu suport a l&rsquo;Associaci&oacute; DMD-Cat, que disposa d&rsquo;un nucli molt actiu a l&rsquo;Alt Empord&agrave;, i a totes les accions que promogui per fer difusi&oacute; de dret a morir dignament, que es formalitzaran a trav&eacute;s d&rsquo;un conveni de col&middot;laboraci&oacute;&rdquo;.</p>',	'img/articles/img1.jpg'),
(1,	1,	'2021-12-21 21:57:11',	'El Consell Comarcal dona suport al dret a morir dignament',	'<p style=\"text-align: justify;\">En el darrer ple del mes d&rsquo;octubre, el Consell Comarcal va aprovar per unanimitat una moci&oacute; de suport al dret a morir dignament. Aquesta moci&oacute; vol reafirmar la posici&oacute; de l&rsquo;ens tot afirmant que &laquo;la llibertat de la persona no s&rsquo;ha de perdre en cap moment de la vida, ni tampoc en el proc&eacute;s final que ens porta a la mort&raquo;, alhora que pren el comprom&iacute;s de donar suport, defensar i divulgar el dret de les persones a ser assistides al final de la vida.</p>\r\n<p style=\"text-align: justify;\">El text aprovat tamb&eacute; &eacute;s una declaraci&oacute; a favor de desplegar amb rapidesa els mecanismes per fer possible l&rsquo;eutan&agrave;sia en aquells casos que ho requereixin i que es promocioni el Document de Voluntats Anticipades (DVA). &Eacute;s un document en el qual l&rsquo;usuari &ndash;qualsevol ciutad&agrave;&ndash; pot explicar per endavant quin tractament m&egrave;dic vol rebre. Es pot redactar fins i tot quan no es pateix cap malaltia.</p>\r\n<p style=\"text-align: justify;\">En la seva exposici&oacute;, el text detalla articulats com la Declaraci&oacute; Universal dels Drets Humans, la constituci&oacute; espanyola on es fan valdre alguns drets com &laquo;la dignitat de la persona i el lliure desenvolupament de la seva personalitat&raquo; i l&rsquo;Estatut d&rsquo;Autonomia de 2006 que ja &eacute;s m&eacute;s expl&iacute;cit en proclamar que &laquo;totes les persones tenen el dret de rebre un tractament adequat al dolor, a cures pal&middot;liatives integrals i a viure amb dignitat el proc&eacute;s de llur mort&rdquo;.</p>\r\n<p style=\"text-align: justify;\">El vicepresident del Consell Comarcal, Josep Maria Bernils, assenyala que &ldquo;amb aquest acord, la nostra instituci&oacute; expressa de forma clara el seu suport a l&rsquo;Associaci&oacute; DMD-Cat, que disposa d&rsquo;un nucli molt actiu a l&rsquo;Alt Empord&agrave;, i a totes les accions que promogui per fer difusi&oacute; de dret a morir dignament, que es formalitzaran a trav&eacute;s d&rsquo;un conveni de col&middot;laboraci&oacute;&rdquo;.</p>',	'img/articles/img1.jpg'),
(1,	1,	'2021-12-21 21:57:56',	'El Consell Comarcal dona suport al dret a morir dignament',	'<p style=\"text-align: justify;\">En el darrer ple del mes d&rsquo;octubre, el Consell Comarcal va aprovar per unanimitat una moci&oacute; de suport al dret a morir dignament. Aquesta moci&oacute; vol reafirmar la posici&oacute; de l&rsquo;ens tot afirmant que &laquo;la llibertat de la persona no s&rsquo;ha de perdre en cap moment de la vida, ni tampoc en el proc&eacute;s final que ens porta a la mort&raquo;, alhora que pren el comprom&iacute;s de donar suport, defensar i divulgar el dret de les persones a ser assistides al final de la vida.</p>\r\n<p style=\"text-align: justify;\">El text aprovat tamb&eacute; &eacute;s una declaraci&oacute; a favor de desplegar amb rapidesa els mecanismes per fer possible l&rsquo;eutan&agrave;sia en aquells casos que ho requereixin i que es promocioni el Document de Voluntats Anticipades (DVA). &Eacute;s un document en el qual l&rsquo;usuari &ndash;qualsevol ciutad&agrave;&ndash; pot explicar per endavant quin tractament m&egrave;dic vol rebre. Es pot redactar fins i tot quan no es pateix cap malaltia.</p>\r\n<p style=\"text-align: justify;\">En la seva exposici&oacute;, el text detalla articulats com la Declaraci&oacute; Universal dels Drets Humans, la constituci&oacute; espanyola on es fan valdre alguns drets com &laquo;la dignitat de la persona i el lliure desenvolupament de la seva personalitat&raquo; i l&rsquo;Estatut d&rsquo;Autonomia de 2006 que ja &eacute;s m&eacute;s expl&iacute;cit en proclamar que &laquo;totes les persones tenen el dret de rebre un tractament adequat al dolor, a cures pal&middot;liatives integrals i a viure amb dignitat el proc&eacute;s de llur mort&rdquo;.</p>\r\n<p style=\"text-align: justify;\">El vicepresident del Consell Comarcal, Josep Maria Bernils, assenyala que &ldquo;amb aquest acord, la nostra instituci&oacute; expressa de forma clara el seu suport a l&rsquo;Associaci&oacute; DMD-Cat, que disposa d&rsquo;un nucli molt actiu a l&rsquo;Alt Empord&agrave;, i a totes les accions que promogui per fer difusi&oacute; de dret a morir dignament, que es formalitzaran a trav&eacute;s d&rsquo;un conveni de col&middot;laboraci&oacute;&rdquo;.</p>',	'img/articles/img1.jpg'),
(1,	2,	'2021-12-21 21:45:37',	'El Consell Comarcal aprova un pressupost',	'<p style=\"text-align: justify;\">El Consell Comarcal de l&rsquo;Alt Empord&agrave; ha aprovat inicialment el pressupost per a l\'exercici de l\'any vinent que puja a un total de 33.531.347,94 euros., que presenta un decreixement del pressupost de l&rsquo;exercici anterior (34,6 MEUR) a causa de la finalitzaci&oacute; dels projectes subvencionats pel FEDER i la reducci&oacute; dels contractes de suport als municipis que finan&ccedil;a el SOC. El pressupost va ser aprovat per unanimitat de tots els grups comarcals.</p>\r\n<p style=\"text-align: justify;\">El cap&iacute;tol d&rsquo;inversions contempla tot un seguit d&rsquo;actuacions que venen derivades pel pressupost del 2021. En concret, l&rsquo;any vinent es culminar&agrave; la construcci&oacute; de la nova fase del Centre de Tractament de Residus (CTR) i el Centre de Protecci&oacute; d&rsquo;Animals aix&iacute; com el Programa d&rsquo;Especialitzaci&oacute; i Competitivitat Territorial (PECT) en l&rsquo;&agrave;mbit de la pedra seca. Tot i que el pressupost no ho reflecteix, l&rsquo;ens comarcal aspira a fer realitat un centre de producci&oacute; d&rsquo;energia fotovoltaica al CTR, finan&ccedil;at amb els fons Next Generation, que permetr&agrave; autoabastir totes les instal&middot;lacions. Tamb&eacute; es contempla incorporar al llarg del proper exercici el servei de gesti&oacute; d&rsquo;aig&uuml;es residuals, transferit per l&rsquo;ACA, i s&rsquo;est&agrave; treballat en un nou programa d&rsquo;actuacions de promoci&oacute; tur&iacute;stica.</p>\r\n<p style=\"text-align: justify;\">Com va alertar el vicepresident Josep Maria Bernils, en la seva explicaci&oacute; davant el ple del Consell, els pressupostos de la Generalitat condicionen actualment els de l&rsquo;ens comarcal, ja que els contractes programa (amb els que funcionen &agrave;rees com Joventut i Benestar Social) no estan aprovats, tot i el comprom&iacute;s que tinguin la llum verda en les properes setmanes i que, en alguns apartats, s&rsquo;espera que milloraran el finan&ccedil;ament dels serveis.</p>',	'img/articles/logo2.png'),
(1,	3,	'2021-12-21 21:54:32',	'L&#39;Organització Comarcal',	'<p style=\"text-align: justify;\">El govern i l\'administraci&oacute; de la comarca corresponen al Consell comarcal. El territori de la comarca &eacute;s l\'&agrave;mbit en el qual el Consell comarcal exerceix les seves compet&egrave;ncies, i &eacute;s definit per l\'agrupaci&oacute; dels termes municipals que la integren.</p>\r\n<p style=\"text-align: justify;\">El consell comarcal &eacute;s constitu&iuml;t per regidors dels municipis que formen la demarcaci&oacute;, elegits d\'acord amb els mecanismes establerts per la llei, segons el nombre total de membres que correspongui a cada Consell comarcal i d\'acord amb els resultats electorals aconseguits en les eleccions municipals per \"cada partit, coalici&oacute;, federaci&oacute; o agrupaci&oacute; d\'electors\".</p>\r\n<p style=\"text-align: justify;\">El nombre de membres del Consell comarcal es determina segons els residents de la comarca i d\'acord amb l\'escala seg&uuml;ent: &middot;</p>\r\n<ul style=\"text-align: justify;\">\r\n<li>Fins a 50.000 residents: 19.</li>\r\n<li>De 50.001 a 100.000: 25.</li>\r\n<li>De 100.001 a 500.000: 33.</li>\r\n<li>De 500.001 endavant: 39.</li>\r\n</ul>\r\n<p style=\"text-align: justify;\">Els &ograve;rgans del consell comarcal s&oacute;n: el ple, el President i la comissi&oacute; especial de comptes. Tamb&eacute; forma part de l\'organitzaci&oacute; comarcal el gerent, que t&eacute; funcions executives. De tots aquests &ograve;rgans, la llei en determina minuciosament quines s&oacute;n les atribucions i les funcions que tenen.</p>\r\n<p style=\"text-align: justify;\">En la sessi&oacute; constitutiva del consell comarcal s\'elegeix el President per votaci&oacute; de tots els membres que el componen. Qualsevol membre del Consell pot ser candidat a president. Ser&agrave; elegit el qui hagi obtingut la majoria absoluta en la primera votaci&oacute; o la simple en la segona. En el cas d\'empat entre dos candidats o m&eacute;s es procedeix a una tercera votaci&oacute;, i, si l\'empat es d&oacute;na novament, ser&agrave; elegit president el candidat de la llista amb m&eacute;s consellers. El President pot ser destitu&iuml;t per moci&oacute; de censura d\'acord \"amb el que estableix la legislaci&oacute; de r&egrave;gim local\".</p>\r\n<p style=\"text-align: justify;\">El president ha de nomenar, entre els consellers, un o m&eacute;s vice-presidents que l\'han de substituir en cas de vacant, abs&egrave;ncia o impediment, i en els quals pot delegar les seves atribucions.</p>\r\n<p style=\"text-align: justify;\">La durada del mandat dels membres del consell comarcal coincideix amb el de les corporacions municipals. La p&egrave;rdua de la condici&oacute; de regidor determina tamb&eacute; la p&egrave;rdua de la condici&oacute; de membre del Consell comarcal.</p>\r\n<p style=\"text-align: justify;\">El ple del consell &eacute;s constitu&iuml;t pel president i els consellers, i la comissi&oacute; especial de comptes &eacute;s integrada pel nombre de consellers que determini el ple. Ha de comprendre almenys un membre de cada grup pol&iacute;tic representat en el consell comarcal.</p>\r\n<p style=\"text-align: justify;\">El consell comarcal pot complementar l\'organitzaci&oacute; b&agrave;sica en els termes que preveu la legislaci&oacute; de r&egrave;gim local, o b&eacute; mitjan&ccedil;ant acord del ple o amb l\'aprovaci&oacute; del reglament org&agrave;nic comarcal corresponent.</p>',	'img/articles/logo2.png');

DROP TABLE IF EXISTS `usuari_categoria_edita`;
CREATE TABLE `usuari_categoria_edita` (
  `id_usuari` bigint(20) NOT NULL,
  `id_categoria` bigint(20) NOT NULL,
  `data_edicio` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `nom` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id_usuari`,`id_categoria`,`data_edicio`),
  KEY `fk_categoriaEditaUser` (`id_categoria`),
  CONSTRAINT `fk_categoriaEditaUser` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_usuariEditaCat` FOREIGN KEY (`id_usuari`) REFERENCES `usuari` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- 2021-12-21 22:16:24
