<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ServiceModele
 *
 * @author MIRADO
 */
class ServiceModele extends BaseModele{
    private $service;
    private $personnels;
    
    
    //put your code here
    function __construct() {
        parent::__construct();
        
    }

    function getService() {
        return $this->service;
    }

    function getPersonnels() {
        return $this->personnels;
    }

    function setService($service) {
        $this->service = $service;
    }

    function setPersonnels($personnels) {
        $this->personnels = $personnels;
    }
}
