<?php
require_once __DIR__.'/../config/db.php';
require_once __DIR__.'/../models/Produit.php';

class ProduitController {
    public static function getAll() {
        global $pdo;
        $stmt = $pdo->query('SELECT * FROM Produit');
        $produits = [];
        while ($row = $stmt->fetch()) {
            $produits[] = new Produit($row['id'], $row['nom'], $row['prix'], $row['description']);
        }
        return $produits;
    }

    public static function create($nom, $prix, $description) {
        global $pdo;
        $stmt = $pdo->prepare('INSERT INTO Produit (nom, prix, description) VALUES (?, ?, ?)');
        $stmt->execute([$nom, $prix, $description]);
    }
    // Ajoutez ici les méthodes CRUD
}
