<?php
require_once __DIR__.'/../config/db.php';
require_once __DIR__.'/../models/Facture.php';

class FactureController {
    public static function getAll() {
        global $pdo;
        $stmt = $pdo->query('SELECT * FROM Facture');
        $factures = [];
        while ($row = $stmt->fetch()) {
            $factures[] = new Facture($row['id'], $row['commande_id'], $row['date_facture'], $row['total']);
        }
        return $factures;
    }

    public static function create($commande_id, $date_facture, $total) {
        global $pdo;
        $stmt = $pdo->prepare('INSERT INTO Facture (commande_id, date_facture, total) VALUES (?, ?, ?)');
        $stmt->execute([$commande_id, $date_facture, $total]);
    }
    // Ajoutez ici les méthodes CRUD
}
