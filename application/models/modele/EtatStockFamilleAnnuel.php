<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EtatStockFamilleAnnuel
 *
 * @author MIRADO
 */
class EtatStockFamilleAnnuel extends BaseModele{
    //put your code here
    private $etatStatParMois = [];
    
    
    function __construct() {
       parent::__construct(); 
    }
    
    function getEtatStatParMois() {
        return $this->etatStatParMois;
    }
    
    function setEtatStatParMois($etatStatParMois) {
        $this->etatStatParMois = $etatStatParMois;
    }
    
}
