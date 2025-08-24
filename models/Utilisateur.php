<?php
class Utilisateur {
    public $id;
    public $nom;
    public $prenom;
    public $email;
    public $mot_de_passe;
    public $role;
    public $departement_id;
    public function __construct($id, $nom, $prenom, $email, $mot_de_passe, $role, $departement_id = null) {
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->mot_de_passe = $mot_de_passe;
        $this->role = $role;
        $this->departement_id = $departement_id;
    }
}
