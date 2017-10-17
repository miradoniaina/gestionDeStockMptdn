<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DetailRetourReferenceViewModele
 *
 * @author MIRADO
 */
require_once 'DetailRetourModele.php';
class DetailRetourReferenceViewModele extends DetailRetourModele{
    //put your code here
    private $idMateriel;
    private $listeReference = [];
    
    function __construct() {
        parent::__construct();
        $this->load->model('dao/MaterielDao');
        $this->load->model('dao/ListeReferenceDao');
        $this->load->model('dao/ListeReferenceRetourDao');
        $this->load->model('modele/ReferenceModele');
    }
    
    function getListeReference() {
        return $this->listeReference;
    }

    function setListeReference($listeReference) {
        $this->listeReference = $listeReference;
    }

    function getIdMateriel() {
        return $this->idMateriel;
    }

    function setIdMateriel($idMateriel) {
        $this->idMateriel = $idMateriel;
    }
    
    function getDesignationMateriel(){
        return $this->MaterielDao->findByIdMateriel($this->idMateriel)->designation;
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
}
