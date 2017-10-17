<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EtatDesMouvementsDesStocksModele
 *
 * @author MIRADO
 */
class EtatDesMouvementsDesStocksModele extends BaseModele {
    //put your code here
    private $reference;
    private $materiel;
    private $quantiteInitiale;
    private $entree;
    private $sortie;
    private $quantiteFinale;
    private $unite;
    
    function __construct() {
        
    }
    
    function getReference() {
        return $this->reference;
    }

    function getMateriel() {
        return $this->materiel;
    }

    function getQuantiteInitiale() {
        return $this->quantiteInitiale;
    }

    function getEntree() {
        return $this->entree;
    }

    function getSortie() {
        return $this->sortie;
    }

    function getQuantiteFinale() {
        return $this->quantiteFinale;
    }

    function getUnite() {
        return $this->unite;
    }

    function setReference($reference) {
        $this->reference = $reference;
    }

    function setMateriel($materiel) {
        $this->materiel = $materiel;
    }

    function setQuantiteInitiale($quantiteInitiale) {
        $this->quantiteInitiale = $quantiteInitiale;
    }

    function setEntree($entree) {
        $this->entree = $entree;
    }

    function setSortie($sortie) {
        $this->sortie = $sortie;
    }

    function setQuantiteFinale($quantiteFinale) {
        $this->quantiteFinale = $quantiteFinale;
    }

    function setUnite($unite) {
        $this->unite = $unite;
    }
}
