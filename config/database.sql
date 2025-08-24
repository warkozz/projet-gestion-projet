-- Script de création de la base de données et des tables
CREATE DATABASE IF NOT EXISTS gestion_projets CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE gestion_projets;

CREATE TABLE Utilisateur (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100),
    prenom VARCHAR(100),
    email VARCHAR(150) UNIQUE,
    mot_de_passe VARCHAR(255),
    role ENUM('employe', 'chef_de_projet') NOT NULL
);

CREATE TABLE Departement (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100)
);

CREATE TABLE Projet (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(150),
    description TEXT,
    date_debut DATE,
    date_fin DATE,
    chef_de_projet_id INT,
    FOREIGN KEY (chef_de_projet_id) REFERENCES Utilisateur(id)
);

CREATE TABLE Projet_Employe (
    projet_id INT,
    employe_id INT,
    PRIMARY KEY (projet_id, employe_id),
    FOREIGN KEY (projet_id) REFERENCES Projet(id),
    FOREIGN KEY (employe_id) REFERENCES Utilisateur(id)
);

CREATE TABLE Client (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100),
    email VARCHAR(150),
    adresse VARCHAR(255)
);

CREATE TABLE Commande (
    id INT AUTO_INCREMENT PRIMARY KEY,
    client_id INT,
    date_commande DATE,
    FOREIGN KEY (client_id) REFERENCES Client(id)
);

CREATE TABLE Facture (
    id INT AUTO_INCREMENT PRIMARY KEY,
    commande_id INT,
    date_facture DATE,
    total DECIMAL(10,2),
    FOREIGN KEY (commande_id) REFERENCES Commande(id)
);

CREATE TABLE Produit (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100),
    prix DECIMAL(10,2),
    description TEXT
);

CREATE TABLE Categorie (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100)
);

CREATE TABLE Produit_Categorie (
    produit_id INT,
    categorie_id INT,
    PRIMARY KEY (produit_id, categorie_id),
    FOREIGN KEY (produit_id) REFERENCES Produit(id),
    FOREIGN KEY (categorie_id) REFERENCES Categorie(id)
);
