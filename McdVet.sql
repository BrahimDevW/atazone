CREATE TABLE couleur(
   id_couleur INT,
   nom_couleur VARCHAR(50) NOT NULL,
   PRIMARY KEY(id_couleur)
);

CREATE TABLE utilisateur(
   id INT,
   nom VARCHAR(100) NOT NULL,
   prenom VARCHAR(100) NOT NULL,
   adresse_ VARCHAR(320) NOT NULL,
   code_postale VARCHAR(50) NOT NULL,
   email VARCHAR(255) NOT NULL,
   mdp VARCHAR(50) NOT NULL,
   PRIMARY KEY(id)
);

CREATE TABLE categorie(
   id_categorie INT,
   nom_categorie VARCHAR(50) NOT NULL,
   PRIMARY KEY(id_categorie)
);

CREATE TABLE article(
   id_article INT,
   nom_article VARCHAR(50) NOT NULL,
   prix DECIMAL(15,2),
   quantiter INT NOT NULL,
   id INT NOT NULL,
   id_categorie INT NOT NULL,
   id_couleur INT NOT NULL,
   PRIMARY KEY(id_article),
   FOREIGN KEY(id) REFERENCES utilisateur(id),
   FOREIGN KEY(id_categorie) REFERENCES categorie(id_categorie),
   FOREIGN KEY(id_couleur) REFERENCES couleur(id_couleur)
);
