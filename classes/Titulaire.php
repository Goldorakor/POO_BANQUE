<?php

class Titulaire {
    // on déclare nos attributs pour caractériser un titulaire lambda
    private string $_nom;
    private string $_prenom;
    private DateTime $_dateNaissance;
    private string $_ville;
    private array $_comptesBancaires; // la collection de comptes bancaires possédés par le titulaire (= l'objet courant) sous forme d'un tableau rempli d'objets 'compteBancaire'

    // on construit notre fonction __construct
    public function __construct (string $nom, string $prenom, string $dateNaissance, string $ville) {
        $this->_nom = $nom;
        $this->_prenom = $prenom;
        $this->_dateNaissance = new DateTime ($dateNaissance);
        $this->_ville = $ville;
        $this->_comptesBancaires = []; // le tableau est vide, le titulaire n'a ouvert aucun compte bancaire pour le moment :
        // il va se remplir au fur et à mesure par des éléments qui seront des objets de la classe CompteBancaire.
    }


    public function getNom () : string
    {
        return $this->_nom;
    }

    public function setNom (string $nom)
    {
        $this->_nom = $nom;

        return $this;
    }

    public function getPrenom () : string
    {
        return $this->_prenom;
    }

    public function setPrenom (string $prenom)
    {
        $this->_prenom = $prenom;

        return $this;
    }

    public function getDateNaissance () : DateTime
    {
        return $this->_dateNaissance;
    }


    //  peu de chances que la date de naissance du titulaire change ! 
    public function setDateNaissance (string $dateNaissance)
    {
        $this->_dateNaissance = new DateTime ($dateNaissance);

        return $this;
    }


    public function getAgeTitulaire () : int {

        $now = new DateTime(); // date et heure actuelles

        $interval = $this->_dateNaissance->diff($now); // Calculer la différence

        return $interval->y;
    }




    public function getVille () : string
    {
        return $this->_ville;
    }

    public function setVille (string $ville)
    {
        $this->_ville = $ville;

        return $this;
    }

    public function getComptesBancaires () : array
    {
        return $this->_comptesBancaires;
    }

    // setter peu utile car nous n'allons pas écraser d'objets 'compteBancaire'
    public function setComptesBancaires (array $comptesBancaires)
    {
        $this->_comptesBancaires = $comptesBancaires;

        return $this;
    }


    public function addCompteBancaire (CompteBancaire $compteBancaire) {
        $this->_comptesBancaires[] = $compteBancaire;
    }


    public function afficherInformationsGlobales () {
        $result = "<h4>Informations de $this</h4><br>Son âge est de ".$this->getAgeTitulaire()." ans, il vit à ".$this->getVille().".<br>Voici la liste de ses comptes bancaires avec les détails de chaque compte :<ul>";
        foreach ($this->_comptesBancaires as $compteBancaire) {
            $result .= "<li>".$compteBancaire->getLibelle()." (en ".$compteBancaire->getDevise().") et dont le solde est de ".$compteBancaire->getSolde()." euros.</li>";
        }
        $result .= "</ul>";
        return $result;
    }


    public function __toString () {
        return $this->_prenom." ".$this->_nom;
    }
}



