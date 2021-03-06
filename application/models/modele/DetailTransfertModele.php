<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DetailTransfertModele
 *
 * @author MIRADO
 */
class DetailTransfertModele extends BaseModele {

    //put your code here
    private $quantite;
//    private $qteRestant;
//    private $porteSource;
//    private $porteDest;
//    private $transfert;
//    private $type;
    private $refMateriel;
    private $materiel;
//    private $dateTransfert;
//    private $dateRecuperation;
//    private $commentaire;
    private $listeReference = [];
    private $designationMateriel;
//    private $numeroPorteSource;
//    private $numeroPorteDest;

    function __construct() {
        parent::__construct();
        $this->load->model('modele/ReferenceModele');
        $this->load->model('dao/MaterielDao');
        $this->load->model('dao/ListeReferenceDao');
        $this->load->model('dao/ListeReferenceRetourDao');
    }
    
    
    
    function getQuantite() {
        return $this->quantite;
    }

    function getPorteSource() {
        return $this->porteSource;
    }

    function getIdPorteSource() {
        if (empty($this->porteSource)) {
            return 0;
        }

        return $this->porteSource[0]->id_porte;
    }

    function getIdPorteDest() {

        if ((empty($this->porteDest))) {
            return 0;
        }

        return $this->porteDest[0]->id_porte;
    }

    function getPorteDest() {
        return $this->porteDest;
    }

    function getTransfert() {
        return $this->transfert;
    }

    function getType() {
        return $this->type;
    }

    function getRefMateriel() {
        return $this->refMateriel;
    }

    function setQuantite($quantite) {
        try {
            if (($quantite < 1) || (!is_numeric($quantite))) {
                throw new Exception("Quantité non valide");
            }
            $this->quantite = $quantite;
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    function setPorteSource($porteSource) {
        try {
            if ((empty($porteSource))) {
                throw new Exception("La porte source n'éxiste pas");
            }

            $this->porteSource = $porteSource;
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    function setPorteDest($porteDest) {
        try {
            if (count($porteDest) != 1) {
                throw new Exception("La porte destinataire n'éxiste pas");
            }
            $this->porteDest = $porteDest;
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    function setTransfert($transfert) {
        $this->transfert = $transfert;
    }

//    function setType($type) {
//        $this->type = $type;
//    }

    function setRefMateriel($refMateriel) {
        $this->refMateriel = $refMateriel;
    }

    function getMateriel() {

        if (is_null($this->materiel)) {
            return "";
        }

        return $this->materiel[0]->designation;
    }

    function getMateriel1() {
        return $this->materiel;
    }

    function getIdMateriel() {
        if (is_null($this->materiel)) {
            return "";
        }

        return $this->materiel[0]->id_materiel;
    }

    function setMateriel($materiel) {
        try {
            $this->materiel = $materiel;
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    function setMaterielByRef($ref) {
        try {
            $reference = explode("-", $ref);
            $this->materiel = $this->MaterielDao->findByRef($reference[0]);
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    function setMateriel1($materiel) {
        $this->materiel = $materiel;
    }

    function getDateTransfert() {
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

    function getListeReference() {
        return $this->listeReference;
    }

    function getListeReferenceIndice($i) {
        return $this->listeReference[$i];
    }

    function setListeReference($listeReference) {
        $tab = explode(";", $listeReference);

        try {
            for ($i = 0; $i < count($tab); $i++) {
                if (explode("-", $tab[$i])[0] != explode("-", $this->refMateriel)[0]) {
                    throw new Exception("la référence à la ligne " . ($i + 1) . " ne correspond pas au matériel ");
                }
            }

            for ($i = 0; $i < count($tab); $i++) {
                $ref = new ReferenceModele();
                $ref->setReference($tab[$i]);
                array_push($this->listeReference, $ref);
            }
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    function getListeReferenceRetour() {
        return $this->listeReferenceRetour;
    }

    function controleDejaRetourne($tab, $idDetailTransfert) {

        $retourByIdDetailTransfert = $this->ListeReferenceRetourDao->findAllRetourByIdDetailTransfert($idDetailTransfert);

        for ($i = 0; $i < count($tab); $i++) {
            for ($j = 0; $j < count($retourByIdDetailTransfert); $j++) {
                if($tab[$i] === $retourByIdDetailTransfert[$j]->reference) {
                    throw new Exception("la référence à ligne " . ($i+1) ." à déjà été retourné");
                }
            }
        }
    }

    function controleListeTousDifferent($referencesTab) {
        for ($i = 0; $i < count($referencesTab); $i++) {
            for ($j = $i + 1; $j < count($referencesTab); $j++) {
                if ($referencesTab[$i] === $referencesTab[$j]) {
                    throw new Exception("la référence à la ligne " . ($i + 1) . " se répète à la ligne " . ($j + 1));
                }
            }
        }
    }

    function controleListeReference($liste_reference_detail_transfert, $referencesTab, $idDetailTransfert) {

        for ($i = 0; $i < count($referencesTab); $i++) {
            $t = count($liste_reference_detail_transfert);
            for ($j = 0; $j < $t; $j++) {

                if ($referencesTab[$i] === $liste_reference_detail_transfert[$j]->reference) {
                    break;
                } else if (($referencesTab[$i] !== $liste_reference_detail_transfert[$j]->reference) && ($j < $t - 1)) {
                    continue;
                }

                throw new Exception("la référence \"" . $referencesTab[$i] . "\" ligne " .($i + 1) . " n'est pas valide ");
            }
        }
    }

    function setListeReferenceRetour($listeReferenceRetour, $idDetailTransfert) {

        $tab = explode(";", $listeReferenceRetour);

        try {
            $liste_reference_detail_transfert = $this->ListeReferenceDao->findByIdDetailTransfert($idDetailTransfert);

            $this->controleListeTousDifferent($tab);
            $this->controleListeReference($liste_reference_detail_transfert, $tab, $idDetailTransfert);
            $this->controleDejaRetourne($tab, $idDetailTransfert);

            for ($i = 0; $i < count($tab); $i++) {
                $ref = new ReferenceModele();
                $ref->setReference($tab[$i]);
                array_push($this->listeReference, $ref);
            }
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    function getDateRecuperation() {
        return $this->dateRecuperation->format("Y-m-d H:i:s");
    }

    function getDateRecuperationFormat() {
        return $this->dateRecuperation->format("d-m-Y H:i:s");
    }

    function setDateRecuperation($dateRecuperation) {

        try {
            $dateRec = date_create($dateRecuperation);
            if ($dateRec <= new DateTime()) {
                throw new Exception("Date de récupération invalide");
            }

            $this->dateRecuperation = $dateRec;
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    function getDesignationMateriel() {
        return $this->designationMateriel;
    }

    function setDesignationMateriel($designationMateriel) {
        $this->designationMateriel = $designationMateriel;
    }

    function getNumeroPorteSource() {
        return $this->numeroPorteSource;
    }

    function getNumeroPorteDest() {
        return $this->numeroPorteDest;
    }

    function setNumeroPorteSource($numeroPorteSource) {
        $this->numeroPorteSource = $numeroPorteSource;
    }

    function setNumeroPorteDest($numeroPorteDest) {
        $this->numeroPorteDest = $numeroPorteDest;
    }

    function getQteRestant() {
        return $this->qteRestant;
    }

    function setQteRestant($qteRestant) {
        $this->qteRestant = $qteRestant;
    }

}
