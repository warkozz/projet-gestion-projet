<?php
require_once __DIR__.'/../config/db.php';
require_once __DIR__.'/../models/Projet.php';

class ProjetController {
    public static function getAll() {
        global $pdo;
        $stmt = $pdo->query('SELECT * FROM Projet');
        $projets = [];
        while ($row = $stmt->fetch()) {
            $projets[] = new Projet($row['id'], $row['nom'], $row['description'], $row['date_debut'], $row['date_fin'], $row['chef_de_projet_id']);
        }
        return $projets;
    }
    // Ajoutez ici les méthodes CRUD
}
