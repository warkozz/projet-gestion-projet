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
    // Ajoutez ici les méthodes CRUD
}
