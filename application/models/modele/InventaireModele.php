<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of InventaireModele
 *
 * @author MIRADO
 */
class InventaireModele extends BaseModele {
    //put your code here
    private $reference;
    private $materiel;
    private $quantiteStock;
    private $unite;
    
    function __construct() {
        parent::__construct();
    }

    function getReference() {
        return $this->reference;
    }

    function getMateriel() {
        return $this->materiel;
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

    function getQuantiteStock() {
        return $this->quantiteStock;
    }

    function setQuantiteStock($quantiteStock) {
        $this->quantiteStock = $quantiteStock;
    }

    
    function setUnite($unite) {
        $this->unite = $unite;
    }


}
