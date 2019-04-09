
CREATE TABLE IF NOT EXISTS PLACE(
  ID_PLACE INT(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
  LATITUDE INT(11),
  LONGITUDE INT(11),
  ALTITUDE INT(11),
  PLACE_NAME VARCHAR(26) NOT NULL,
  REMARQUE LONGTEXT NOT NULL
);

CREATE TABLE IF NOT EXISTS USERS(
	ID_USER INT(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
	USER_NAME TINYTEXT NOT NULL,
	USER_EMAIL TINYTEXT,
	USER_PASSWORD LONGTEXT NOT NULL,
	ADDRESS VARCHAR(20)
);

CREATE TABLE IF NOT EXISTS OFFRE(
  ID_OFFRE INT(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
  REFERENCE int(11)  UNIQUE,
  LABEL TINYTEXT NOT NULL,
  FILE_NAME TINYTEXT NOT NULL,
  DESCRIPTION LONGTEXT,
  TYPE_OFFRE INT(1),
  QUANTITE INT(11) DEFAULT NULL,
  PRIX int(11)
);




CREATE TABLE IF NOT EXISTS EMPLOYEE(
  ID_EMPLOYEE INT(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
  EMPLOYEE_NAME VARCHAR(26),
  EMPLOYEE_LAST_NAME VARCHAR(26),
  NUM_SECURITE_SOCIAL INT(20) UNIQUE ,
  EMPLOYEE_MAIL TINYTEXT NOT NULL,
  EMPLOYEE_PASSWORD LONGTEXT NOT NULL,
  EMPLOYEE_STATUS VARCHAR(26) NOT NULL
);

CREATE TABLE IF NOT EXISTS DEMAND (
  ID_DEMAND INT(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
  DATE_DEMANDE DATE,
  REMARQUE LONGTEXT,
  ID_USER INT(11),
  ID_OFFRE INT(11),
  DATE_START DATE,
  DATE_END DATE,
  ACCEPTED BOOLEAN,
  FOREIGN KEY(ID_OFFRE) REFERENCES OFFRE(ID_OFFRE),
  FOREIGN KEY(ID_USER) REFERENCES USERS(ID_USER)
);

CREATE TABLE IF NOT EXISTS COMMAND(
  ID_COMMAND INT(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
  DATE_COMMAND DATE,
  REMARQUE LONGTEXT,
  ID_USER INT(11),
  ID_OFFRE INT(11),
  DATE_START DATE,
  DATE_END DATE,
  ID_EMPLOYEE INT(11),
  ID_PLACE INT(11),
  FOREIGN KEY(ID_OFFRE) REFERENCES OFFRE(ID_OFFRE),
  FOREIGN KEY(ID_USER) REFERENCES USERS(ID_USER),
  FOREIGN KEY(ID_PLACE) REFERENCES PLACE(ID_PLACE),
  FOREIGN KEY(ID_EMPLOYEE) REFERENCES EMPLOYEE(ID_EMPLOYEE)

);



CREATE TABLE IF NOT EXISTS EQUIPE (
  ID_EQUIPE INT(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
  NAME_EQUIPE VARCHAR()
  DESCRIPTION LONGTEXT,
  CURRENT_LOCATION INT(11),
  NB_MEMBERS INT(11),
  FOREIGN KEY(CURRENT_LOCATION) REFERENCES PLACE(ID_PLACE)
);


CREATE TABLE IF NOT EXISTS INTERVENTION(
  ID_INTERVENTION INT(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
  ID_EQUIPE INT(11) DEFAULT NULL,
  ID_COMMANDE INT(11),
  FOREIGN KEY(ID_EQUIPE) REFERENCES EQUIPE(ID_EQUIPE),
  FOREIGN KEY(ID_COMMAND) REFERENCES COMMAND(ID_COMMAND)
);


INSERT IGNORE INTO OFFRE(LABEL,FILE_NAME, DESCRIPTION,TYPE_OFFRE, QUANTITE,PRIX) VALUES ('Bi-bouteille', 'bloc_bi_bouteilles.jpg', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression.',0,10, '70');
INSERT IGNORE INTO OFFRE(LABEL,FILE_NAME, DESCRIPTION,TYPE_OFFRE, QUANTITE,PRIX) VALUES ('Robinetterie', 'robinetterie.jpg', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression.',0,10, '30');
INSERT IGNORE INTO OFFRE(LABEL,FILE_NAME, DESCRIPTION,TYPE_OFFRE, QUANTITE,PRIX) VALUES ('Détendeur', 'détendeur.jpg', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression.',0,10, '30');
INSERT IGNORE INTO OFFRE(LABEL,FILE_NAME, DESCRIPTION,TYPE_OFFRE, QUANTITE,PRIX) VALUES ('Gilet stabilisateur', 'stab-solid.jpg', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression.',0,10, '60');
INSERT IGNORE INTO OFFRE(LABEL,FILE_NAME, DESCRIPTION,TYPE_OFFRE, QUANTITE,PRIX) VALUES ('Chronomètre', 'chronomètre.jpg', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression.',0,10, '15');
INSERT IGNORE INTO OFFRE(LABEL,FILE_NAME, DESCRIPTION,TYPE_OFFRE, QUANTITE,PRIX) VALUES ('Profondimètre', 'profondimètre.jpg', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression.',0,10, '15');
INSERT IGNORE INTO OFFRE(LABEL,FILE_NAME, DESCRIPTION,TYPE_OFFRE, QUANTITE,PRIX) VALUES ('Couteau', 'couteau.jpg', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression.',0,10, '10');
INSERT IGNORE INTO OFFRE(LABEL,FILE_NAME, DESCRIPTION,TYPE_OFFRE, QUANTITE,PRIX) VALUES ('Jeu de tables de plongée immergeable', 'table-de-plongée.jpg', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression.',0,10, '20');
INSERT IGNORE INTO OFFRE(LABEL,FILE_NAME, DESCRIPTION,TYPE_OFFRE, QUANTITE,PRIX) VALUES ('Masque à verres correcteurs', 'masque-de-plongee-avec-verres-correcteurs-pro.jpg', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression.',0,10, '30');
INSERT IGNORE INTO OFFRE(LABEL,FILE_NAME, DESCRIPTION,TYPE_OFFRE, QUANTITE,PRIX) VALUES ('Compresseur', 'compresseur.jpg', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression.',0,10, '50');
INSERT IGNORE INTO OFFRE(LABEL,FILE_NAME, DESCRIPTION,TYPE_OFFRE, QUANTITE,PRIX) VALUES ('Trousse d\’urgence', 'trousse-de-secours-plongee.jpg', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression.',0,10, '20');

INSERT IGNORE INTO OFFRE(LABEL,FILE_NAME, DESCRIPTION,TYPE_OFFRE, QUANTITE,PRIX) VALUES ('Installation de matériel', 'equipement_plongee.jpg', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression.',1,'100');
INSERT IGNORE INTO OFFRE(LABEL,FILE_NAME, DESCRIPTION,TYPE_OFFRE, QUANTITE,PRIX) VALUES('Maintenance de matériel', 'photo-materiel.jpg', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression.',1,'100');
INSERT IGNORE INTO OFFRE(LABEL,FILE_NAME, DESCRIPTION,TYPE_OFFRE, QUANTITE,PRIX) VALUES ('Support de surface', 'photo-equipement.jpg', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression.',1,'100');
