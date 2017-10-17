<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DetailRetourModele
 *
 * @author MIRADO
 */
class DetailRetourModele extends BaseModele{
    private $idRetourMateriel;
    private $idDetailTransfert;
    private $quantite;
    
    function __construct() {
        parent::__construct();
    }
   
    function getIdRetourMateriel() {
        return $this->idRetourMateriel;
    }

    function getIdDetailTransfert() {
        return $this->idDetailTransfert;
    }

    function getQuantite() {
        return $this->quantite;
    }

    function setIdRetourMateriel($idRetourMateriel) {
        $this->idRetourMateriel = $idRetourMateriel;
    }

    function setIdDetailTransfert($idDetailTransfert) {
        $this->idDetailTransfert = $idDetailTransfert;
    }

    function setQuantite($quantite) {
        $this->quantite = $quantite;
    }

}
