<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class EntreeStockController extends MY_Controller {

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
        $this->load->model('modele/MvtStockModele');
        
    }

    public function index() {

        $data = array(
            'fournisseurs' => $this->BaseService->findAll("fournisseur"),
            'materiels' => $this->BaseService->findAll("materiel"),
            'familleMateriel' => $this->BaseService->findAll("famille"),
            'sousCommande' => unserialize($this->session->userdata("sousEntree")),
            'exception' => ''
        );

        $this->load->view('mvtstock/entree', $data);
    }

    public function entreeajouter() {
        $sousEntrees = unserialize($this->session->userdata("sousEntree"));

        $this->load->library('form_validation');

        $this->form_validation->set_rules('idFournisseur', 'IdFournisseur', 'trim');
        $this->form_validation->set_rules('fournisseur', 'Fournisseur', 'trim');
        $this->form_validation->set_rules('idMateriel', 'IdMateriel', 'trim');
        $this->form_validation->set_rules('materiel', 'Materiel', 'trim');
        $this->form_validation->set_rules('quantite', 'Quantite', 'trim');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('mvtstock/entree', $data);
        } else {
            try {
                $sousEntree = new MvtStockModele();
                $sousEntree->setIdFournisseur($this->input->post("idFournisseur"));
                $sousEntree->setFournisseur($this->input->post("fournisseur"));
                $sousEntree->setIdMateriel($this->input->post("idMateriel"));
                $sousEntree->setMateriel($this->input->post("materiel"));

//           $sousEntree->setPrixUnitaire($idFournisseur);
                $sousEntree->setQuantite($this->input->post("quantite"));
                $sousEntree->setType('entrée');

                array_push($sousEntrees, $sousEntree);

                $this->session->set_userdata('sousEntree', serialize($sousEntrees));


                $data = array(
                    'fournisseurs' => $this->BaseService->findAll("fournisseur"),
                    'materiels' => $this->BaseService->findAll("materiel"),
                    'exception' => ''
                );
                redirect("index.php/entreeStockController");
            } catch (Exception $ex) {

                $data = array(
                    'fournisseurs' => $this->BaseService->findAll("fournisseur"),
                    'materiels' => $this->BaseService->findAll("materiel"),
                    'exception' => $ex->getMessage()
                );

                $this->load->view('mvtstock/entree', $data);
            }
        }
    }

    public function entreenregistrer() {
        $this->load->model('services/MvtStockServices');
        $sousEntrees = unserialize($this->session->userdata("sousEntree"));

        try {
            $this->MvtStockServices->enregistrerListeEntree($sousEntrees, $this->input->post("dateMvt"), $this->input->post("commentaire"));
            $this->session->set_userdata('sousEntree', serialize([]));

            $data = array(
                'fournisseurs' => $this->BaseService->findAll("fournisseur"),
                'materiels' => $this->BaseService->findAll("materiel"),
                'exception' => ''
            );

            $this->load->view('mvtstock/entree', $data);
        } catch (Exception $ex) {
            $data = array(
                'fournisseurs' => $this->BaseService->findAll("fournisseur"),
                'materiels' => $this->BaseService->findAll("materiel"),
                'exception' => $ex->getMessage()
            );

            $this->load->view('mvtstock/entree', $data);
        }
    }

}
