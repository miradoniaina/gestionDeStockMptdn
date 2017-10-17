<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EtatFamilleStkModele
 *
 * @author MIRADO
 */
class EtatFamilleStkModele extends BaseModele{
    private $id_famille;
    private $famille;
    private $qteRestant = 0;
    
    
    //put your code here
    function __construct() {
        parent::__construct(); 
    }
    
    function getId_famille() {
        return $this->id_famille;
    }

    function getFamille() {
        return $this->famille;
    }

    function getQteRestant() {
        return $this->qteRestant;
    }

    function setId_famille($id_famille) {
        $this->id_famille = $id_famille;
    }

    function setFamille($famille) {
        $this->famille = $famille;
    }

    function setQteRestant($qteRestant) {
        $this->qteRestant = $qteRestant;
    }
}
