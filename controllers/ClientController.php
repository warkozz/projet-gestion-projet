<?php
require_once __DIR__.'/../config/db.php';
require_once __DIR__.'/../models/Client.php';

class ClientController {
    public static function getAll() {
        global $pdo;
        $stmt = $pdo->query('SELECT * FROM Client');
        $clients = [];
        while ($row = $stmt->fetch()) {
            $clients[] = new Client($row['id'], $row['nom'], $row['email'], $row['adresse']);
        }
        return $clients;
    }

    public static function create($nom, $email, $adresse) {
        global $pdo;
        $stmt = $pdo->prepare('INSERT INTO Client (nom, email, adresse) VALUES (?, ?, ?)');
        $stmt->execute([$nom, $email, $adresse]);
    }
    // Ajoutez ici les méthodes CRUD
}
