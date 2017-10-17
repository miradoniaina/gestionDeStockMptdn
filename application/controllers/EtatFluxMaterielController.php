<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EtatController
 *
 * @author MIRADO
 */
class EtatFluxMaterielController extends My_Controller {

    //put your code here
    function __construct() {
        parent::__construct();
        $this->checkLogIn();
        $this->load->model('dao/DetailTransfertViewDao');
        $this->load->model('dao/DetailTransfertDao');
        $this->load->model('dao/TransfertDao');
        $this->load->model('dao/InventaireFluxDao');
    }

    function index() {
        $data = array(
            'critere' => 'Tous',
            'date_inventaire' => (new DateTime())->format('d-m-Y'),
            'typeMateriels' => $this->BaseService->findAll('famille'),
            'inventaires' => $this->InventaireFluxDao->inventaire((new DateTime())->format('d-m-Y'), 1, ''),
            'exception' => ''
        );

        $this->load->view("flux_materiels/etat/index", $data);
    }

    function inventaire() {

        $data = array(
            'critere' => $this->input->get('par'),
            'date_inventaire' => $this->input->get('dateinventaire'),
            'idfamille' => $this->input->get('famille'),
            'par' => $this->input->get('par'),
            'typeMateriels' => $this->BaseService->findAll('famille'),
            'inventaires' => $this->InventaireFluxDao->inventaire($this->input->get('dateinventaire'), $this->input->get('famille'), $this->input->get('par')),
            'exception' => ''
        );

        $this->load->view("flux_materiels/etat/index", $data);
    }
}
