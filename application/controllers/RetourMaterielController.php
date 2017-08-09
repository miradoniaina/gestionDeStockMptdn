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
class RetourMaterielController extends MY_Controller {

    //put your code here
    function __construct() {
        parent::__construct();
        $this->checkLogIn();
        $this->load->model("modele/DetailTransfertModele");
        $this->load->model("services/TransfertMaterielService");
    }

    function index() {
        $data = array(
            'sousRetours' => unserialize($this->session->userdata('sousRetours')),
            'exception' => ''
        );

        var_dump($data['sousRetours']);

        $this->load->view("flux_materiels/retour_materiel/retour_materiel", $data);
    }

    function enregistrer() {

        try {
            
            $sousRetours = unserialize($this->session->userdata('sousRetours'));
            
            $this->TransfertMaterielService->enregistrerRetoursMatériels($sousRetours, $this->input->post("dateMvt"), $this->input->post("commentaire"));
            
//            $this->session->set_userdata("sousRetours", serialize([]));
            
            $data = array(
                'sousRetours' => unserialize($this->session->userdata('sousRetours')),
                'exception' => ''
            );
            
            $this->load->view("flux_materiels/retour_materiel/retour_materiel", $data);
        } catch (Exception $ex) {
            
            $data = array(
                'sousRetours' => unserialize($this->session->userdata('sousRetours')),
                'exception' => $ex->getMessage()
            );

            $this->load->view("flux_materiels/retour_materiel/retour_materiel", $data);
        }
    }

}
