<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of InventaireFluxModele
 *
 * @author MIRADO
 */
class InventaireFluxModele extends BaseModele{
    //put your code here
    private $critere;
    
    private $typeMateriel;
    private $appartenant;
    private $prets;
    private $emprunts;
    private $unite;
    
    
    function __construct() {
        parent::__construct();
    }
    
    

    function getTypeMateriel() {
        return $this->typeMateriel;
    }

    function getAppartenant() {
        return $this->appartenant;
    }

    function getPrets() {
        return $this->prets;
    }

    function getEmprunts() {
        return $this->emprunts;
    }

    function getUnite() {
        return $this->unite;
    }

    function getCritere() {
        return $this->critere;
    }

    function setCritere($critere) {
        $this->critere = $critere;
    }

    
    function setTypeMateriel($typeMateriel) {
        $this->typeMateriel = $typeMateriel;
    }

    function setAppartenant($appartenant) {
        $this->appartenant = $appartenant;
    }

    function setPrets($prets) {
        $this->prets = $prets;
    }

    function setEmprunts($emprunts) {
        $this->emprunts = $emprunts;
    }

    function setUnite($unite) {
        $this->unite = $unite;
    }
    
}
