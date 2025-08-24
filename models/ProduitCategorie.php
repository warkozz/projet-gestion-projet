<?php
class ProduitCategorie {
    public $produit_id;
    public $categorie_id;
    public function __construct($produit_id, $categorie_id) {
        $this->produit_id = $produit_id;
        $this->categorie_id = $categorie_id;
    }
}
