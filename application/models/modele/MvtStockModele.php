<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of BaseService
 *
 * @author MIRADO
 */
class MvtStockModele extends BaseModele {
    private $idMateriel;
    private $idFournisseur;
    private $prixUnitaire;
    private $quantite;
    private $dateMvt;
    private $type;
    private $commentaire;
    
    private $fournisseur;
    private $materiel;
    
    private $codebarres;
    
    private $idDetenteurs;
    private $detenteurs;
    
    private $porte;
    private $idPorte;
    private $listeReference = [];
    
    
    function __construct() {
        parent::__construct();
        $this->load->model("modele/ReferenceModele");
    }
    
    function getIdMateriel() {
        return $this->idMateriel;
    }

    function getIdFournisseur() {
        if($this->idFournisseur == ""){
           return "null";
        }
        return $this->idFournisseur;
    }

    function getPrixUnitaire() {
        return $this->prixUnitaire;
    }

    function getQuantite() {
        return $this->quantite;
    }

    function getDateMvt() {
        return $this->dateMvt;
    }

    function setIdMateriel($idMateriel) {
        $this->idMateriel = $idMateriel;
    }

    function setIdFournisseur($idFournisseur) {
        if($idFournisseur ===""){
            $this->idFournisseur = "null";
            return;
        }
//        $this->idFournisseur = $idFournisseur;
    }

    function setPrixUnitaire($prixUnitaire) {
        $this->prixUnitaire = $prixUnitaire;
    }

    function setQuantite($quantite) {
        try{
            if(($quantite < 1) || (!is_numeric($quantite))){
                throw new Exception("quantite non valide");
            }
        } catch (Exception $ex) {
            throw $ex;
        }
        
        $this->quantite = $quantite;
    }

    function setDateMvt($dateMvt) {
        
        if($dateMvt==""){
            $this->dateMvt = new DateTime();
            return;
        }
        $date=date_create($dateMvt);
        
        $this->dateMvt =  new DateTime(date_format($date,"Y-m-d H:i:s"));
    }  
    
    function getType() {
        return $this->type;
    }

    function setType($type) {
        $this->type = $type;
    }

    function getFournisseur() {
        return $this->fournisseur;
    }

    function setFournisseur($fournisseur) {
        $this->fournisseur = $fournisseur;
    }

    function getMateriel() {
        return $this->materiel;
    }

    function setMateriel($materiel) {
        $this->materiel = $materiel;
    }

    function getCommentaire() {
        return $this->commentaire;
    }

    function setCommentaire($commentaire) {
        $this->commentaire = $commentaire;
    }
    
    function getCodebarres() {
        return $this->codebarres;
    }

    function setCodebarres($codebarres) {
        $this->codebarres = $codebarres;
    }
    
    function getIdDetenteurs() {
        return $this->idDetenteurs;
    }

    function setIdDetenteurs($idDetenteurs) {
        $this->idDetenteurs = $idDetenteurs;
    }

    function getPorte() {
        return $this->porte;
    }

    function setPorte($porte) {
        $this->porte = $porte;
    }

    function getIdPorte() {
        return $this->idPorte;
    }

    function setIdPorte($idPorte) {
        $this->idPorte = $idPorte;
    }
    function getDetenteurs() {
        return $this->detenteurs;
    }

    function setDetenteurs($detenteurs) {
        $this->detenteurs = $detenteurs;
    }


    function getListeReference() {
        return $this->listeReference;
    }

    function setListeReference($listeReference) {
        $tab = explode(";", $listeReference);

        for ($i = 0; $i < count($tab); $i++) {
            $ref = new ReferenceModele();
            $ref->setReference($tab[$i]);
            array_push($this->listeReference, $ref);
        }
    }


    
}
