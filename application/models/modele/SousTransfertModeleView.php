<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SousTransfertModeleView
 *
 * @author MIRADO
 */
include 'SousTransfertModele.php';
class SousTransfertModeleView extends SousTransfertModele {

    //put your code here
    private $designationMateriel;
    private $porteSource;
    private $porteDest;

    private $quantiteRestant;
    
    function __construct() {
        parent::__construct();
    }
    
    function getDesignationMateriel() {
        return $this->designationMateriel;
    }

    function getQuantiteRestant() {
        return $this->quantiteRestant;
    }

    function setDesignationMateriel($designationMateriel) {
        $this->designationMateriel = $designationMateriel;
    }

    function setQuantiteRestant($quantiteRestant) {
        $this->quantiteRestant = $quantiteRestant;
    }

    
    function getPorteSource() {
        return $this->porteSource;
    }

    function getPorteDest() {
        return $this->porteDest;
    }


    function setPorteSource($porteSource) {
        $this->porteSource = $porteSource;
    }

    function setPorteDest($porteDest) {
        $this->porteDest = $porteDest;
    }
    
    
}
