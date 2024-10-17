<?php

class CompteBancaire {
    // on déclare nos attributs pour caractériser un compte bancaire lambda
    private string $_libelle;
    private float $_solde;
    private string $_devise;
    private Titulaire $_titulaire;

    // on construit notre fonction __construct
    public function __construct (string $libelle, float $solde, string $devise, Titulaire $titulaire) {
        $this->_libelle = $libelle;
        $this->_solde = $solde;
        $this->_devise = $devise;
        $this->_titulaire = $titulaire;
        $this->_titulaire->addCompteBancaire($this);
    }


    public function getLibelle () : string
    {
        return $this->_libelle;
    }

    public function setLibelle (string $libelle)
    {
        $this->_libelle = $libelle;

        return $this;
    }

    public function getSolde () : float
    {
        return $this->_solde;
    }

    public function setSolde (float $solde)
    {
        $this->_solde = $solde;

        return $this;
    }

    public function getDevise () : string
    {
        return $this->_devise;
    }

    public function setDevise (string $devise)
    {
        $this->_devise = $devise;

        return $this;
    }

    public function getTitulaire () : Titulaire
    {
        return $this->_titulaire;
    }

    public function setTitulaire (Titulaire $titulaire)
    {
        $this->_titulaire = $titulaire;

        return $this;
    }


    public function crediterCompte (float $somme) : CompteBancaire {
        $this->_solde = $this->_solde + $somme;  // $this->_solde +=  $somme; ne fonctionne pas !
        return $this;
    }


    public function debiterCompte (float $somme) : CompteBancaire {
        $this->_solde = $this->_solde - $somme;  // $this->_solde -= $somme; ne fonctionne pas !
        return $this;
    }


    public function envoyerVirement_actuelvers2 (CompteBancaire $compte2, float $montant) {
        $this->debiterCompte ($montant);
        $compte2->crediterCompte ($montant);
        return $this; 
    }

    public function recevoirVirement_actuelvers2 (CompteBancaire $compte2, float $montant) {
        $this->crediterCompte ($montant);
        $compte2->debiterCompte ($montant);
        return $this;
    }

   
    public function afficherInfosCompte () : string {
        $result = "<h4>Information sur le compte $this</h4><ul>
        <li>devise monétaire : ".$this->getDevise()."</li>
        <li>solde du compte : ".$this->getSolde()." ".$this->getDevise()."</li>
        <li>prénom du titulaire : ".$this->_titulaire->getPrenom()."</li>
        <li>nom du titulaire : ".$this->_titulaire->getNom()."</li></ul>";

        return $result;
    }


    public function __toString () : string {
        return $this->_libelle;
    }
}