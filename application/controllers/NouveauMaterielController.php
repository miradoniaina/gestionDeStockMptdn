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
class NouveauMaterielController extends My_Controller {

    //put your code here
    function __construct() {
        parent::__construct();
        $this->checkLogIn();
    }

    function index() {

        $data = array(
            'exception' => '',
            'unites' => $this->BaseService->findAll('unite'),
            'familles' => $this->BaseService->findAll('famille')
        );
        
        $this->load->view("crud/nouveau_materiel", $data);
    }
    
    
    function enregistrerMateriel() {
        $upload_data = $this->do_upload('image');
        
        $array = array(
            'id_unite' => $this->input->post('unite'),
            'id_famille' => $this->input->post('famille'),
            'reference_materiel' => $this->input->post('reference_materiel'),
            'designation' => $this->input->post('designation'),
            'details_materiel' => $this->input->post('details_materiel'),
            'image' => $upload_data['file_name']
        );
        
        $this->BaseService->save('materiel', $array);

        redirect('index.php/nouveauMaterielController');
    }

}
