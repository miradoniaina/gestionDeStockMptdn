<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CodeBarreModele
 *
 * @author MIRADO
 */
class CodeBarreModele extends BaseModele{
    //put your code here
    private $idMateriel;
    private $idDepartement;
    private $idMvtStock;
    private $refCodeBarre;
    
    function __construct() {
        parent::__construct();
    }
    
    function getIdMateriel() {
        return $this->idMateriel;
    }

    function getIdDepartement() {
        return $this->idDepartement;
    }

    function getIdMvtStock() {
        return $this->idMvtStock;
    }

    function getRefCodeBarre() {
        return $this->refCodeBarre;
    }

    function setIdMateriel($idMateriel) {
        $this->idMateriel = $idMateriel;
    }

    function setIdDepartement($idDepartement) {
        $this->idDepartement = $idDepartement;
    }

    function setIdMvtStock($idMvtStock) {
        $this->idMvtStock = $idMvtStock;
    }

    function setRefCodeBarre($refCodeBarre) {
        $this->refCodeBarre = $refCodeBarre;
    }


}
