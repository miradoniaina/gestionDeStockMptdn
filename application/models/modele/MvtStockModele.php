<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MvtStockModele
 *
 * @author MIRADO
 */
class MvtStockModele extends BaseModele {
    
    private $dateMvt;
    private $commentaire;
    private $type;
    private $idPersonnel;
    
    
    //put your code here
    function __construct() {
        parent::__construct();
    }

    function getDateMvt() {
        return $this->dateMvt;
    }
    
    function getDateMvtFormattedToInsert() {
        return $this->getDateMvt()->format('Y-m-d H:i');
    }

    function getDateMvtFormatted() {
        return $this->getDateMvt()->format('d-m-Y H:i');
    }
    
    function getCommentaire() {
        return stripslashes($this->commentaire);
    }

    function setDateMvt($dateMvt) {
        try {
            if ($dateMvt == "") {
                $this->dateMvt = new DateTime();
                return;
            }
            $date = date_create($dateMvt);
            $this->dateMvt = new DateTime(date_format($date, "Y-m-d H:i"));
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    function setCommentaire($commentaire) {
        $this->commentaire = addslashes($commentaire);
    }
    function getType() {
        return $this->type;
    }

    function setType($type) {
        $this->type = $type;
    }
    function getIdPersonnel() {
        return $this->idPersonnel;
    }

    function setIdPersonnel($idPersonnel) {
        $this->idPersonnel = $idPersonnel;
    }
}
