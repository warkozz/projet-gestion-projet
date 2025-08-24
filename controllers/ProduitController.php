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
    // Ajoutez ici les méthodes CRUD
}
