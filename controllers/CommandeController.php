<?php
require_once __DIR__.'/../config/db.php';
require_once __DIR__.'/../models/Commande.php';

class CommandeController {
    private $id;
    private $client_id;
    private $date_commande;

    public function __construct($id, $client_id, $date_commande) {
        $this->id = $id;
        $this->client_id = $client_id;
        $this->date_commande = $date_commande;
    }

    public static function create($client_id, $date_commande) {
        global $pdo;
        $stmt = $pdo->prepare('INSERT INTO Commande (client_id, date_commande) VALUES (?, ?)');
        $stmt->execute([$client_id, $date_commande]);
    }

    public static function getAll() {
        global $pdo;
        $stmt = $pdo->query('SELECT * FROM Commande');
        $commandes = [];
        while ($row = $stmt->fetch()) {
            $commandes[] = new Commande($row['id'], $row['client_id'], $row['date_commande']);
        }
        return $commandes;
    }

    // Pour compatibilité avec ajout_facture.php
    public static function getAllCommandes() {
        return self::getAll();
    }
}