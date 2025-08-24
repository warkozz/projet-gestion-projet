<?php
require_once __DIR__.'/../config/db.php';
require_once __DIR__.'/../models/Categorie.php';

class CategorieController {
    public static function getAll() {
        global $pdo;
        $stmt = $pdo->query('SELECT * FROM Categorie');
        $categories = [];
        while ($row = $stmt->fetch()) {
            $categories[] = new Categorie($row['id'], $row['nom']);
        }
        return $categories;
    }

    public static function create($nom) {
        global $pdo;
        $stmt = $pdo->prepare('INSERT INTO Categorie (nom) VALUES (?)');
        $stmt->execute([$nom]);
    }
    // Ajoutez ici les méthodes CRUD
}
