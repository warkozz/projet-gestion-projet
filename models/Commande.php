<?php
class Commande {
    public $id;
    public $client_id;
    public $date_commande;
    public function __construct($id, $client_id, $date_commande) {
        $this->id = $id;
        $this->client_id = $client_id;
        $this->date_commande = $date_commande;
    }
}
