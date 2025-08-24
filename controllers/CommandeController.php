<?php
require_once 'modele/DAO.php';

class Commande {
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

    // ...existing methods...
}