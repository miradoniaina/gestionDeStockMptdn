<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TransfertModele
 *
 * @author MIRADO
 */
class TransfertModele extends BaseModele {
    private $transfert;
    private $type;
    private $dateRecuperation;
    private $idPorteSource;
    private $idPorteDest;
    private $dateTransfert;
    private $commentaire;
    private $idPersonnel;
    
    function __construct() {
        parent::__construct();
    }
    
    function getDateTransfert() {
        return $this->dateTransfert->format("Y-m-d H:i:s");
    }
    
    function getDateTransfertFormat(){
        return $this->dateTransfert->format("d-m-Y H:i:s");
    }
    
    function getCommentaire() {
        return $this->commentaire;
    }

    function setDateTransfert($dateTransfert) {
        if ($dateTransfert == "" || $dateTransfert==null) {
            $this->dateTransfert = new DateTime();
            return;
        }
        $date = date_create($dateTransfert);
        
        $this->dateTransfert = new DateTime(date_format($date, "Y-m-d H:i:s"));
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
    
    function getDateRecuperationFormat(){
        return $this->dateTransfert->format("d-m-Y H:i:s");
    }

    function getIdPersonnel() {
        return $this->idPersonnel;
    }

    function setTransfert($transfert) {
        $this->transfert = $transfert;
    }

    function setType($type) {
        $this->type = $type;
    }

    function setDateRecuperation($dateRecuperation) {
        $this->dateRecuperation = $dateRecuperation;
        if ($dateRecuperation == "" || $dateRecuperation==null) {
            $this->dateRecuperation = new DateTime();
            return;
        }
        $date = date_create($dateRecuperation);
        
        $this->dateRecuperation = new DateTime(date_format($date, "Y-m-d H:i:s"));
    }
    
    function setIdPersonnel($idPersonnel) {
        $this->idPersonnel = $idPersonnel;
    }
    function setCommentaire($commentaire) {
        $this->commentaire = $commentaire;
    }
    
    function getIdPorteSource() {
        return $this->idPorteSource;
    }

    function getIdPorteDest() {
        return $this->idPorteDest;
    }

    function setIdPorteSource($idPorteSource) {
        $this->idPorteSource = $idPorteSource;
    }

    function setIdPorteDest($idPorteDest) {
        $this->idPorteDest = $idPorteDest;
    }
}
