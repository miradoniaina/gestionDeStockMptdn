<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SousTransfertModele
 *
 * @author MIRADO
 */
class SousTransfertModele extends BaseModele{
    private $idTransfert;
    private $idMateriel;
    private $transfert;
    private $type;
    private $dateRecuperation;
    private $idPorteSource;
    private $idPorteDest;
    private $quantite;
    
    function __construct() {
        parent::__construct();
    }
    
    function getIdTransfert() {
        return $this->idTransfert;
    }

    function getIdMateriel() {
        return $this->idMateriel;
    }

    function getTransfert() {
        return $this->transfert;
    }

    function getType() {
        return $this->type;
    }

    function getDateRecuperation() {
        return $this->dateRecuperation->format("Y-m-d H:i:s");
    }

    function getDateRecuperationFormat() {
        return $this->dateRecuperation->format("d-m-Y H:i:s");
    }
    
    function getIdPorteSource() {
        return $this->idPorteSource;
    }

    function getIdPorteDest() {
        return $this->idPorteDest;
    }

    function getQuantite() {
        return $this->quantite;
    }

    function setIdTransfert($idTransfert) {
        $this->idTransfert = $idTransfert;
    }

    function setIdMateriel($idMateriel) {
        $this->idMateriel = $idMateriel;
    }

    function setTransfert($transfert) {
        $this->transfert = $transfert;
    }

    function setType($type) {
        $this->type = $type;
    }

    function setDateRecuperation($dateRecuperation) {
        
        try {
            $dateRec = date_create($dateRecuperation);

            $this->dateRecuperation = $dateRec;
        } catch (Exception $ex) {
            throw $ex;
        }
        
    }

    function setIdPorteSource($idPorteSource) {
        $this->idPorteSource = $idPorteSource;
    }

    function setIdPorteDest($idPorteDest) {
        $this->idPorteDest = $idPorteDest;
    }

    function setQuantite($quantite) {
        $this->quantite = $quantite;
    }


}
