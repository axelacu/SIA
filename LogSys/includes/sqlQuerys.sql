
CREATE TABLE IF NOT EXISTS PLACE(
  ID_PLACE INT(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
  LATITUDE INT(11) UNIQUE,
  LONGITUDE INT(11) UNIQUE,
  ALTITUDE INT(11),
  PLACE_NAME VARCHAR(20) NOT NULL,
  CONDITION LONGTEXT
);

CREATE TABLE IF NOT EXISTS USERS(
	ID_USER int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
	USER_NAME TINYTEXT NOT NULL,
	USER_EMAIL TINYTEXT UNIQUE NOT NULL,
	USER_PASSWORD LONGTEXT NOT NULL,
	ADDRESS VARCHAR(20)
);

CREATE TABLE IF NOT EXISTS OFFRE(
  ID_OFFRE int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
  REFERENCE int(11) UNIQUE,
  LABEL TINYTEXT NOT NULL,
  FILE_NAME TINYTEXT NOT NULL,
  DESCRIPTION LONGTEXT,
  PRIX int(11)
);


CREATE TABLE IF NOT EXISTS MATERIEL(
  ID_MATERIEL int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
  ID_OFFRE INT(11),
  QUANTITE INT(11),
  FOREIGN KEY(ID_OFFRE) REFERENCES OFFRE(ID_OFFRE)
);


CREATE TABLE IF NOT EXISTS SERVICE(
  ID_SERVICE int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
  ID_OFFRE INT(11),
  FOREIGN KEY(ID_OFFRE) REFERENCES OFFRE(ID_OFFRE)

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














INSERT IGNORE INTO MATERIEL(REFERENCE,NOM,FILE_NAME, DESCRIPTION,PRIX) VALUES (1,'Bi-bouteille', 'bloc_bi_bouteilles.jpg', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression.', '70');
INSERT IGNORE INTO MATERIEL(REFERENCE,NOM,FILE_NAME, DESCRIPTION,PRIX) VALUES (2,'Robinetterie', 'robinetterie.jpg', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression.', '30');
INSERT IGNORE INTO MATERIEL(REFERENCE,NOM,FILE_NAME, DESCRIPTION,PRIX) VALUES (3,'Détendeur', 'détendeur.jpg', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression.', '30');
INSERT IGNORE INTO MATERIEL(REFERENCE,NOM,FILE_NAME, DESCRIPTION,PRIX) VALUES (4,'Gilet stabilisateur', 'stab-solid.jpg', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression.', '60');
INSERT IGNORE INTO MATERIEL(REFERENCE,NOM,FILE_NAME, DESCRIPTION,PRIX) VALUES (5,'Chronomètre', 'chronomètre.jpg', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression.', '15');
INSERT IGNORE INTO MATERIEL(REFERENCE,NOM,FILE_NAME, DESCRIPTION,PRIX) VALUES (6,'Profondimètre', 'profondimètre.jpg', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression.', '15');
INSERT IGNORE INTO MATERIEL(REFERENCE,NOM,FILE_NAME, DESCRIPTION,PRIX) VALUES (7,'Couteau', 'couteau.jpg', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression.', '10');
INSERT IGNORE INTO MATERIEL(REFERENCE,NOM,FILE_NAME, DESCRIPTION,PRIX) VALUES (8,'Jeu de tables de plongée immergeable', 'table-de-plongée.jpg', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression.', '20');
INSERT IGNORE INTO MATERIEL(REFERENCE,NOM,FILE_NAME, DESCRIPTION,PRIX) VALUES (9,'Masque à verres correcteurs', 'masque-de-plongee-avec-verres-correcteurs-pro.jpg', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression.', '30');
INSERT IGNORE INTO MATERIEL(REFERENCE,NOM,FILE_NAME, DESCRIPTION,PRIX) VALUES (10,'Compresseur', 'compresseur.jpg', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression.', '50');
INSERT IGNORE INTO MATERIEL(REFERENCE,NOM,FILE_NAME, DESCRIPTION,PRIX) VALUES (11,'Trousse d\’urgence', 'trousse-de-secours-plongee.jpg', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression.', '20');


INSERT IGNORE INTO USERBASKET(ID_USER, DATE_BASKET, ACCEPTED) VALUES (1,CURRENT_DATE , 0);
INSERT IGNORE INTO USERBASKET(ID_USER, DATE_BASKET, ACCEPTED) VALUES (2,CURRENT_DATE , 1);


INSERT IGNORE INTO SERVICE(REFERENCE, LABEL,FILE_NAME,DESCRIPTION) VALUES (1,'Installation de matériel', 'equipement_plongee.jpg', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression.');
INSERT IGNORE INTO SERVICE(REFERENCE, LABEL,FILE_NAME,DESCRIPTION) VALUES (2,'Maintenance de matériel', 'photo-materiel.jpg', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression.');
INSERT IGNORE INTO SERVICE(REFERNCE, LABEL,FILE_NAME,DESCRIPTION) VALUES (3,'Support de surface', 'photo-equipement.jpg', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression.');
