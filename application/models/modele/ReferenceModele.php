<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ReferenceModele
 *
 * @author MIRADO
 */
class ReferenceModele extends BaseModele{
    //put your code here
    private $reference;
    
    function __construct() {
        parent::__construct();
    }
    
    function getReference() {
        return $this->reference;
    }

    function setReference($reference) {
        $this->reference = $reference;
    }
}
