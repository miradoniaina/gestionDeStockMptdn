<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TransfertModeleView
 *
 * @author MIRADO
 */
require_once 'TransfertModele.php';
class TransfertModeleView extends TransfertModele{
    private $numeroPorteSource;
    private $numeroPorteDest;
    
    //put your code here
    function __construct() {
        parent::__construct();
    }
    
    function getNumeroPorteSource() {
        return $this->numeroPorteSource;
    }

    function getNumeroPorteDest() {
        return $this->numeroPorteDest;
    }

    function setNumeroPorteSource($numeroPorteSource) {
        $this->numeroPorteSource = $numeroPorteSource;
    }

    function setNumeroPorteDest($numeroPorteDest) {
        $this->numeroPorteDest = $numeroPorteDest;
    }
}
