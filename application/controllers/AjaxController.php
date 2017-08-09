<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AjaxController
 *
 * @author MIRADO
 */
class AjaxController extends MY_Controller {

    //put your code here
    function __construct() {
        parent::__construct();
        $this->load->model('dao/DirectionDao');
        $this->load->model('services/MaterielServices');
        $this->load->model('dao/PorteDao');
        $this->load->model('modele/DetailTransfertModele');
    }

    function rechercheMateriel() {

        $json = array(
            'recherche' => $this->MaterielServices->rechercheMateriel($this->input->post("idfamille"), $this->input->post("materiel"))
        );

        echo json_encode($json);
    }

    function directionParDepartement() {

        $json = array(
            'value' => $this->DirectionDao->findByDepartement($this->input->post("iddepartement"))
        );

        echo json_encode($json);
    }

    function recherchePorte() {
        $json = array(
            'value' => $this->PorteDao->findPorteByDirection($this->input->post("id_direction"))
        );
        echo json_encode($json);
    }

    function ajouterRetourAjax() {
        try {
            $sousRetours = unserialize($this->session->userdata("sousRetours"));
            
            $sousRetour = new DetailTransfertModele();
            
            $sousRetour->setQuantite($this->input->post("quantite"));
            
            $sousRetour->setMaterielByRef($this->input->post("reference"));
            
            $sousRetour->setListeReference($this->input->post("listereference"));
            
            array_push($sousRetours, $sousRetour);
            
            $this->session->set_userdata( "sousRetours", serialize($sousRetours));
            
            $json = array(
                'value' => 'ok'
            );

            echo json_encode($json);
        } catch (Exception $ex) {
            echo "erreur";
        }
    }

}
