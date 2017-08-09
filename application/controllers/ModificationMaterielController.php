<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ModificationMaterielController extends MY_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function __construct() {
        parent::__construct();
        $this->checkLogIn();
        $this->load->model('dao/MaterielDao');
    }

    public function index($idmateriel) {

        $data = array(
            'exception' => '',
            'materiel' => $this->MaterielDao->findByIdMateriel($idmateriel),
            'unites' => $this->BaseService->findAll('unite'),
            'familles' => $this->BaseService->findAll('famille')
        );

        $this->load->view('crud/modification_materiel', $data);
    }

    public function enregistrerModification() {
        $upload_data = $this->do_upload('image');

        $modif = array(
            'id_unite' => $this->input->post("unite"),
            'id_famille' => $this->input->post("famille"),
            'reference_materiel' => $this->input->post("reference_materiel"),
            'designation' => $this->input->post("designation"),
            'details_materiel' => $this->input->post("details_materiel"),
            'image' => $upload_data['file_name']
        );

        $this->BaseService->update('materiel', $modif, $this->input->post("id_materiel"));

        redirect('index.php/listeMaterielController/ficheMateriel/' . $this->input->post("id_materiel"));
    }
}
