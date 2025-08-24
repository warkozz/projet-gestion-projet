<?php
require_once __DIR__.'/../config/db.php';
require_once __DIR__.'/../models/Departement.php';
class DepartementController {
    public static function update($id, $nom) {
        global $pdo;
        $stmt = $pdo->prepare('UPDATE Departement SET nom = ? WHERE id = ?');
        $stmt->execute([$nom, $id]);
    }

    public static function delete($id) {
        global $pdo;
        $stmt = $pdo->prepare('DELETE FROM Departement WHERE id = ?');
        $stmt->execute([$id]);
    }
    public static function getAll() {
        global $pdo;
        $stmt = $pdo->query('SELECT * FROM Departement');
        $departements = [];
        while ($row = $stmt->fetch()) {
            $departements[] = new Departement($row['id'], $row['nom']);
        }
        return $departements;
    }
    public static function create($nom) {
        global $pdo;
        $stmt = $pdo->prepare('INSERT INTO Departement (nom) VALUES (?)');
        $stmt->execute([$nom]);
    }
}
