<?php
class ProjetEmploye {
    public $projet_id;
    public $employe_id;
    public function __construct($projet_id, $employe_id) {
        $this->projet_id = $projet_id;
        $this->employe_id = $employe_id;
    }
}
