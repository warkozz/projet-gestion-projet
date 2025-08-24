<?php
require_once __DIR__.'/../config/db.php';
require_once __DIR__.'/../models/Utilisateur.php';

class UtilisateurController {
    public static function getAll() {
        global $pdo;
        $stmt = $pdo->query('SELECT * FROM Utilisateur');
        $users = [];
        while ($row = $stmt->fetch()) {
            $users[] = new Utilisateur(
                $row['id'],
                $row['nom'],
                $row['prenom'],
                $row['email'],
                $row['mot_de_passe'],
                $row['role'],
                isset($row['departement_id']) ? $row['departement_id'] : null
            );
        }
        return $users;
    }
    public static function create($nom, $prenom, $email, $mot_de_passe, $role, $departement_id = null) {
        global $pdo;
        $stmt = $pdo->prepare('INSERT INTO Utilisateur (nom, prenom, email, mot_de_passe, role, departement_id) VALUES (?, ?, ?, ?, ?, ?)');
        $stmt->execute([$nom, $prenom, $email, $mot_de_passe, $role, $departement_id]);
    }
    public static function update($id, $nom, $prenom, $email, $mot_de_passe, $role, $departement_id = null) {
        global $pdo;
        $stmt = $pdo->prepare('UPDATE Utilisateur SET nom = ?, prenom = ?, email = ?, mot_de_passe = ?, role = ?, departement_id = ? WHERE id = ?');
        $stmt->execute([$nom, $prenom, $email, $mot_de_passe, $role, $departement_id, $id]);
    }

    public static function delete($id) {
        global $pdo;
        $stmt = $pdo->prepare('DELETE FROM Utilisateur WHERE id = ?');
        $stmt->execute([$id]);
    }
}
