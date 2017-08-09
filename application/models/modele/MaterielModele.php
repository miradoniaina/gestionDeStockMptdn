<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MaterielModele
 *
 * @author MIRADO
 */
class MaterielModele extends BaseModele{
    //put your code here
    
    private $idUnite;
    private $idFamille;
    private $referenceMateriel;
    private $desigation;
    private $details_html;
    private $prix_unitaire;
    
    function getIdUnite() {
        return $this->idUnite;
    }

    function getIdFamille() {
        return $this->idFamille;
    }

    function getReferenceMateriel() {
        return $this->referenceMateriel;
    }

    function getDesigation() {
        return $this->desigation;
    }

    function getDetails_html() {
        return $this->details_html;
    }

    function getPrix_unitaire() {
        return $this->prix_unitaire;
    }

    function setIdUnite($idUnite) {
        $this->idUnite = $idUnite;
    }

    function setIdFamille($idFamille) {
        $this->idFamille = $idFamille;
    }

    function setReferenceMateriel($referenceMateriel) {
        $this->referenceMateriel = $referenceMateriel;
    }

    function setDesigation($desigation) {
        $this->desigation = $desigation;
    }

    function setDetails_html($details_html) {
        $this->details_html = $details_html;
    }

    function setPrix_unitaire($prix_unitaire) {
        $this->prix_unitaire = $prix_unitaire;
    }


    
}
