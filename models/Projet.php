<?php
class Projet {
    public $id;
    public $nom;
    public $description;
    public $date_debut;
    public $date_fin;
    public $chef_de_projet_id;
    public function __construct($id, $nom, $description, $date_debut, $date_fin, $chef_de_projet_id) {
        $this->id = $id;
        $this->nom = $nom;
        $this->description = $description;
        $this->date_debut = $date_debut;
        $this->date_fin = $date_fin;
        $this->chef_de_projet_id = $chef_de_projet_id;
    }
}
