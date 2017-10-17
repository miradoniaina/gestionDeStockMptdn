<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EtatStockFamilleMois
 *
 * @author MIRADO
 */
class EtatStockFamilleMois extends BaseModele{
    //put your code here
    private $famille = [];
    
    function __construct() {
        parent::__construct(); 
    }
    
    function getFamille() {
        return $this->famille;
    }

    function setFamille($famille) {
        $this->famille = $famille;
    }
}
