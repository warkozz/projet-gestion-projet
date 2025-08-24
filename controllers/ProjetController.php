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

    public static function create($nom, $description, $date_debut, $date_fin, $chef_de_projet_id) {
        global $pdo;
        $stmt = $pdo->prepare('INSERT INTO Projet (nom, description, date_debut, date_fin, chef_de_projet_id) VALUES (?, ?, ?, ?, ?)');
        $stmt->execute([$nom, $description, $date_debut, $date_fin, $chef_de_projet_id]);
    }
    public static function update($id, $nom, $description, $date_debut, $date_fin, $chef_de_projet_id) {
        global $pdo;
        $stmt = $pdo->prepare('UPDATE Projet SET nom = ?, description = ?, date_debut = ?, date_fin = ?, chef_de_projet_id = ? WHERE id = ?');
        $stmt->execute([$nom, $description, $date_debut, $date_fin, $chef_de_projet_id, $id]);
    }

    public static function delete($id) {
        global $pdo;
        $stmt = $pdo->prepare('DELETE FROM Projet WHERE id = ?');
        $stmt->execute([$id]);
    }
}
