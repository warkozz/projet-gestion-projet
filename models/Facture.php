<?php
class Facture {
    public $id;
    public $commande_id;
    public $date_facture;
    public $total;
    public function __construct($id, $commande_id, $date_facture, $total) {
        $this->id = $id;
        $this->commande_id = $commande_id;
        $this->date_facture = $date_facture;
        $this->total = $total;
    }
}
