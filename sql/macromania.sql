DROP DATABASE if exists macromania;
CREATE DATABASE macromania;

DROP TABLE if exists Jeu;
DROP TABLE if exists Accueil;
DROP TABLE if exists Client;
DROP TABLE if exists Panier;

CREATE TABLE Jeu(
    nom VARCHAR(50) PRIMARY KEY,
    nomAffichage VARCHAR(50),
    categorie VARCHAR(30),
    nomImage VARCHAR(50),
    prix INT,
    stock INT,
    stockApresPanier INT,
    note INT,
    CONSTRAINT verifPrix CHECK (prix>=0),
    CONSTRAINT verifStock CHECK (stock>=0),
    CONSTRAINT verifStockApresPanier CHECK (stockApresPanier>=0),
    CONSTRAINT verifNote CHECK ((note>=0)AND(note<=5))
);

CREATE TABLE Accueil(
    nom VARCHAR(50) PRIMARY KEY
);

CREATE TABLE Client(
    nom VARCHAR(50) PRIMARY KEY,
    mail VARCHAR(50),
    mdp VARCHAR(50),
    administrateur INT,
    CONSTRAINT verifAdmin CHECK ((administrateur>0)AND(administrateur<3))
);

CREATE TABLE Panier(
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nomPanier VARCHAR(50),
    nomArticle VARCHAR(50),
    nomAffichage VARCHAR(50),
    quantite INT,
    prixUnit INT,
    FOREIGN KEY fk_Nom(nomPanier) REFERENCES Client(nom) ON DELETE CASCADE,
    CONSTRAINT quantite CHECK (quantite>0),
    CONSTRAINT prixUnit CHECK (prixUnit>=0)
);

INSERT INTO Client(mail,nom,mdp,administrateur) VALUES ("macromania@gmail.com","admin","macromania","1");
