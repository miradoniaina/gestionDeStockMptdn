<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of NouveauMaterielController
 *
 * @author MIRADO
 */
class ListeMaterielController extends My_Controller {

    //put your code here
    function __construct() {
        parent::__construct();
        $this->checkLogIn();
        $this->load->model('dao/MaterielDao');
    }

    function index() {
        $data = array(
            'exception' => '',
            'materiels' => $this->MaterielDao->findAllMateriel()
        );

        var_dump($data);

        $this->load->view("crud/liste_materiel", $data);
    }

    function ficheMateriel($indice) {
        $data = array(
            'exception' => '',
            'materiel' => $this->MaterielDao->findByIdMateriel($indice)
        );


        $this->load->view('crud/fiche_materiel', $data);
    }

    public function supprimer($idmateriel) {
        try {

            $this->BaseService->delete('materiel', $idmateriel);
            
            $data = array(
                'exception' => '',
                'materiels' => $this->MaterielDao->findAllMateriel()
            );
            $this->load->view("crud/liste_materiel", $data);
        } catch (Exception $ex) {

            $data = array(
                'exception' => $ex->getMessage(),
                'materiels' => $this->MaterielDao->findAllMateriel()
            );

            $this->load->view("crud/liste_materiel", $data);
        }
    }

}
