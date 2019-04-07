
CREATE TABLE IF NOT EXISTS USERS(
	ID_USER int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
	USER_NAME TINYTEXT NOT NULL,
	USER_EMAIL TINYTEXT NOT NULL,
	USER_PASSWORD LONGTEXT NOT NULL
);

CREATE TABLE IF NOT EXISTS MATERIEL(
  ID_PRODUCT int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
  NOM TINYTEXT NOT NULL,
  FILE_NAME TINYTEXT NOT NULL,
  DESCRIPTION LONGTEXT,
  PRIX int(11)
);



CREATE TABLE IF NOT EXISTS USERBASKET(
  ID_USERBASKET INT(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
  ID_USER INT(11) NOT NULL,
  DATE_BASKET DATE,
  ACCEPTED INT(1) NOT NULL
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


INSERT IGNORE INTO MATERIEL(NOM,FILE_NAME, DESCRIPTION,PRIX) VALUES ('Mono-bouteille', 'bloc-de-plongee.jpg', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression.', '50');
INSERT IGNORE INTO MATERIEL(NOM,FILE_NAME, DESCRIPTION,PRIX) VALUES ('Bi-bouteille', 'bloc_bi_bouteilles.jpg', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression.', '70');
INSERT IGNORE INTO MATERIEL(NOM,FILE_NAME, DESCRIPTION,PRIX) VALUES ('Robinetterie', 'robinetterie.jpg', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression.', '30');
INSERT IGNORE INTO MATERIEL(NOM,FILE_NAME, DESCRIPTION,PRIX) VALUES ('Détendeur', 'détendeur.jpg', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression.', '30');
INSERT IGNORE INTO MATERIEL(NOM,FILE_NAME, DESCRIPTION,PRIX) VALUES ('Gilet stabilisateur', 'stab-solid.jpg', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression.', '60');
INSERT IGNORE INTO MATERIEL(NOM,FILE_NAME, DESCRIPTION,PRIX) VALUES ('Chronomètre', 'chronomètre.jpg', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression.', '15');
INSERT IGNORE INTO MATERIEL(NOM,FILE_NAME, DESCRIPTION,PRIX) VALUES ('Profondimètre', 'profondimètre.jpg', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression.', '15');
INSERT IGNORE INTO MATERIEL(NOM,FILE_NAME, DESCRIPTION,PRIX) VALUES ('Couteau', 'couteau.jpg', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression.', '10');
INSERT IGNORE INTO MATERIEL(NOM,FILE_NAME, DESCRIPTION,PRIX) VALUES ('Jeu de tables de plongée immergeable', 'table-de-plongée.jpg', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression.', '20');
INSERT IGNORE INTO MATERIEL(NOM,FILE_NAME, DESCRIPTION,PRIX) VALUES ('Masque à verres correcteurs', 'masque-de-plongee-avec-verres-correcteurs-pro.jpg', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression.', '30');
INSERT IGNORE INTO MATERIEL(NOM,FILE_NAME, DESCRIPTION,PRIX) VALUES ('Compresseur', 'compresseur.jpg', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression.', '50');
INSERT IGNORE INTO MATERIEL(NOM,FILE_NAME, DESCRIPTION,PRIX) VALUES ('Trousse d\’urgence', 'trousse-de-secours-plongee.jpg', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression.', '20');



