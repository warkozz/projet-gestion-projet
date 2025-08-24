# Gestion de Projets et Facturation

## Présentation
Ce projet est une application web PHP/MySQL pour la gestion de projets, d'employés, de clients, de commandes, de produits, de catégories et de factures.

## Structure du projet
- `/config/` : Fichiers de configuration (connexion BDD, script SQL)
- `/models/` : Classes PHP pour chaque entité
- `/controllers/` : Logique métier (CRUD)
- `/views/` : Pages HTML/PHP (formulaires, affichages)
- `/auth/` : Authentification (login, logout, register)
- `index.php` : Point d'entrée

## Installation
1. Importez le script SQL `config/database.sql` dans votre serveur MySQL.
2. Configurez l'accès BDD dans `config/db.php`.
3. Placez le projet dans votre serveur web (XAMPP, WAMP, etc.).
4. Accédez à `index.php` via votre navigateur.

## Fonctionnalités principales
- Authentification sécurisée (hashage des mots de passe)
- Gestion des projets (CRUD, chef de projet)
- Gestion des employés et départements
- Gestion des clients et commandes
- Gestion des produits et catégories
- Génération et affichage des factures

## Sécurité
- Les mots de passe sont stockés de façon sécurisée (password_hash/password_verify)
- Gestion des sessions PHP

## Script SQL
Le script `config/database.sql` permet de créer la base de données et toutes les tables avec les clés primaires et étrangères.

## Exemple d'utilisation
- Inscrivez-vous via `/auth/register.php`
- Connectez-vous via `/auth/login.php`
- Accédez aux différentes vues pour gérer les entités

## Technologies
- PHP (POO)
- MySQL
- HTML/CSS/Bootstrap

## Auteur
Projet BTS SIO SLAM - 2025

---

# Documentation Base de Données

Le script SQL crée les entités suivantes :
- Utilisateur
- Departement
- Projet
- Projet_Employe
- Client
- Commande
- Facture
- Produit
- Categorie
- Produit_Categorie

Chaque table respecte les contraintes d'intégrité et les relations du MCD. Voir `config/database.sql` pour le détail des champs et des clés étrangères.
