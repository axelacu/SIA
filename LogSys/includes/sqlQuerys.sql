
CREATE TABLE IF NOT EXISTS CITY(
  ID_CITY INT(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
  CITY_NAME VARCHAR(20) NOT NULL
);

CREATE TABLE IF NOT EXISTS USERS(
	ID_USER int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
	USER_NAME TINYTEXT NOT NULL,
	USER_EMAIL TINYTEXT UNIQUE NOT NULL,
	USER_PASSWORD LONGTEXT NOT NULL
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

CREATE TABLE IF NOT EXISTS MATERIEL(
  ID_PRODUCT int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
  REFERENCE int(11),
  NOM TINYTEXT NOT NULL,
  FILE_NAME TINYTEXT NOT NULL,
  DESCRIPTION LONGTEXT,
  PRIX int(11)
);


CREATE TABLE IF NOT EXISTS USERBASKET(
  ID_USERBASKET INT(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
  ID_USER INT(11) NOT NULL,
  DATE_BASKET DATE,
  ACCEPTED INT(1) NOT NULL DEFAULT 0,
  ID_EMPLOYE INT(11) DEFAULT NULL
);


CREATE TABLE IF NOT EXISTS BASKET(
  ID int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
  ID_BASKET INT(11) NOT NULL,
  ID_PRODUCT INT(11) NOT NULL,
  DATE_BEGINNING DATE,
  DATE_FINISHING DATE,
  FOREIGN KEY (ID_PRODUCT) REFERENCES MATERIEL(ID_PRODUCT),
  FOREIGN KEY (ID_BASKET) REFERENCES USERBASKET(ID_USERBASKET)
);

CREATE TABLE IF NOT EXISTS EQUIPE (
  ID_EQUIPE INT(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
  DESCRIPTION LONGTEXT,
  CURRENT_LOCATION
);



CREATE TABLE IF NOT EXISTS SERVICE(
  ID_SERVICE int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
  REFERENCE int(11) UNIQUE ,
  LABEL TINYTEXT NOT NULL,
  FILE_NAME TINYTEXT NOT NULL,
  DESCRIPTION LONGTEXT
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
