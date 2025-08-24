<?php
class Client {
    public $id;
    public $nom;
    public $email;
    public $adresse;
    public function __construct($id, $nom, $email, $adresse) {
        $this->id = $id;
        $this->nom = $nom;
        $this->email = $email;
        $this->adresse = $adresse;
    }
}
