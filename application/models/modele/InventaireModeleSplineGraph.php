<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of InventaireModeleSplineGraph
 *
 * @author MIRADO
 */
require_once 'InventaireModele.php';
class InventaireModeleSplineGraph extends InventaireModele{
    //put your code here
    
    private $idFamille;
    private $famille;
    
    function __construct() {
         parent::__construct();
    }
    
    function getIdFamille() {
        return $this->idFamille;
    }

    function getFamille() {
        return $this->famille;
    }

    function setIdFamille($idFamille) {
        $this->idFamille = $idFamille;
    }

    function setFamille($famille) {
        $this->famille = $famille;
    }


}
