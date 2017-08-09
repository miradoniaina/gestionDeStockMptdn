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
class PersonnelModele extends BaseModele {

    private $idDepartement;
    private $idRolePersonnel;
    private $matricule;
    private $nom;
    private $prenom;
    private $contact;
    private $email;
    private $mdp;
    private $detenteur;
    private $poste;
    
    function getIdDepartement() {
        return $this->idDepartement;
    }

    function getIdRolePersonnel() {
        return $this->idRolePersonnel;
    }

    function getMatricule() {
        return $this->matricule;
    }

    function getNom() {
        return $this->nom;
    }

    function getPrenom() {
        return $this->prenom;
    }

    function getContact() {
        return $this->contact;
    }

    function getEmail() {
        return $this->email;
    }

    function getMdp() {
        return $this->mdp;
    }

    function getDetenteur() {
        return $this->detenteur;
    }

    function getPoste() {
        return $this->poste;
    }

    function setIdDepartement($idDepartement) {
        $this->idDepartement = $idDepartement;
    }

    function setIdRolePersonnel($idRolePersonnel) {
        $this->idRolePersonnel = $idRolePersonnel;
    }

    function setMatricule($matricule) {
        $this->matricule = $matricule;
    }

    function setNom($nom) {
        $this->nom = $nom;
    }

    function setPrenom($prenom) {
        $this->prenom = $prenom;
    }

    function setContact($contact) {
        $this->contact = $contact;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setMdp($mdp) {
        $this->mdp = $mdp;
    }

    function setDetenteur($detenteur) {
        $this->detenteur = $detenteur;
    }

    function setPoste($poste) {
        $this->poste = $poste;
    }
}
