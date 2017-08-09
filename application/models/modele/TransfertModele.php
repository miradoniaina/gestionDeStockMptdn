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
        if ($dateTransfert == "") {
            $this->dateTransfert = new DateTime();
            return;
        }
        $date = date_create($dateTransfert);
        
        $this->dateTransfert = new DateTime(date_format($date, "Y-m-d H:i:s"));
    }
    
    function setCommentaire($commentaire) {
        $this->commentaire = $commentaire;
    }
    
    function getIdPersonnel() {
        return $this->idPersonnel;
    }

    function setIdPersonnel($idPersonnel) {
        $this->idPersonnel = $idPersonnel;
    }
}
