<?php
class Produit {
    public $id;
    public $nom;
    public $prix;
    public $description;
    public function __construct($id, $nom, $prix, $description) {
        $this->id = $id;
        $this->nom = $nom;
        $this->prix = $prix;
        $this->description = $description;
    }
}
