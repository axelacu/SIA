#Create TABLEA
CREATE TABLE USERS(
	ID_USER int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
	USER_NAME TINYTEXT NOT NULL,
	USER_EMAIL TINYTEXT NOT NULL,
	USER_PASSWORD LONGTEXT NOT NULL
);



CREATE TABLE MATERIEL(
  ID_PRODUCT int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
  NOM TINYTEXT NOT NULL,
  FILE_NAME TINYTEXT NOT NULL,
  DESCRIPTION LONGTEXT,
  PRIX int(11)
);

INSERT INTO MATERIEL(NOM,FILE_NAME, DESCRIPTION,PRIX) VALUES ('Mono-bouteille', 'bloc-de-plongee.jpg', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression.', '50');
INSERT INTO MATERIEL(NOM,FILE_NAME, DESCRIPTION,PRIX) VALUES ('Bi-bouteille', 'bloc_bi_bouteilles.jpg', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression.', '70');
INSERT INTO MATERIEL(NOM,FILE_NAME, DESCRIPTION,PRIX) VALUES ('Robinetteries', 'robinetterie.jpg', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression.', '30');
INSERT INTO MATERIEL(NOM,FILE_NAME, DESCRIPTION,PRIX) VALUES ('Détendeurs', 'détendeur.jpg', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression.', '30');
INSERT INTO MATERIEL(NOM,FILE_NAME, DESCRIPTION,PRIX) VALUES ('Gilets stabilisateurs', 'stab-solid.jpg', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression.', '60');
INSERT INTO MATERIEL(NOM,FILE_NAME, DESCRIPTION,PRIX) VALUES ('Chronomètre', 'chronomètre.jpg', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression.', '15');
INSERT INTO MATERIEL(NOM,FILE_NAME, DESCRIPTION,PRIX) VALUES ('Profondimètre', 'profondimètre.jpg', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression.', '15');
INSERT INTO MATERIEL(NOM,FILE_NAME, DESCRIPTION,PRIX) VALUES ('Couteau', 'couteau.jpg', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression.', '10');
INSERT INTO MATERIEL(NOM,FILE_NAME, DESCRIPTION,PRIX) VALUES ('Jeu de tables de plongée immergeable', 'table-de-plongée.jpg', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression.', '20');
INSERT INTO MATERIEL(NOM,FILE_NAME, DESCRIPTION,PRIX) VALUES ('Masques à verres correcteurs', 'masque-de-plongee-avec-verres-correcteurs-pro', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression.', '30');
INSERT INTO MATERIEL(NOM,FILE_NAME, DESCRIPTION,PRIX) VALUES ('Compresseur', 'compresseur.jpg', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression.', '50');
INSERT INTO MATERIEL(NOM,FILE_NAME, DESCRIPTION,PRIX) VALUES ('Trousse d\’urgence', 'trousse-de-secours-plongee.jpg', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression.', '20');



