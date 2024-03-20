<?php

class Decret {
    public $nom;
    public $prenom;
    public $dateNaissance;
    public $villeNaissance;
    public $paysNaissance;
    public $serie;
    public $departement;


    public function __construct($dateDecret,$nom, $prenom, $dateNaissance, $villeNaissance, $paysNaissance, $serie, $departement)
    {
        $this->dateDecret = $dateDecret;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->dateNaissance = $dateNaissance;
        $this->villeNaissance = $villeNaissance;
        $this->paysNaissance = $paysNaissance;
        $this->serie = $serie;
        $this->departement = $departement;
    }

    public function getDecret()
    {
        return $this;
    }

    public function getDateDecret()
    {
        return $this->dateDecret;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function getPrenom()
    {
        return $this->prenom;
    }

    public function getDateNaissance()
    {
        return $this->dateNaissance;
    }

    public function getVilleNaissance()
    {
        return $this->villeNaissance;
    }

    public function getPaysNaissance()
    {
        return $this->paysNaissance;
    }

    public function getSerie()
    {
        return $this->serie;
    }

    public function getDepartement()
    {
        return $this->departement;
    }
}

?>
