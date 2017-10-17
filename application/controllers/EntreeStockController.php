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
    private $sizeTable = 3;
    private $sizePagination = 4;

    public function __construct() {
        parent::__construct();
        $this->checkLogIn();
        $this->load->model('dao/PersonnelViewDao');
        $this->load->model('dao/MvtStockDao');
        $this->load->model('dao/SousMvtStockDao');
        $this->load->model('modele/SousMvtStockModele');
        $this->load->library('MyPDF128');
    }

    public function index() {
        $data = array(
            'fournisseurs' => $this->BaseService->findAll("fournisseur"),
            'materiels' => $this->BaseService->findAll("materiel"),
            'familleMateriel' => $this->BaseService->findAll("famille"),
            'sousEntrees' => unserialize($this->session->userdata("sousEntree")),
            'exception' => ''
        );

//        var_dump($this->session->userdata());

        $this->load->view('mvtstock/entree', $data);
    }

    function entrees() {
        $data = array(
            'exception' => '',
            'entrees' => $this->MvtStockDao->findAllEntreePage($this->sizeTable, 1),
            'page' => 1,
            'pagination' => $this->MvtStockDao->getPaginationEntree($this->sizePagination, $this->sizeTable, intval(1))
        );

//        var_dump($data['pagination']);

        $this->load->view('mvtstock/liste_entree', $data);
    }
    
    function reinit(){
        $this->session->set_userdata('sousSortie', serialize([]));
        echo json_encode('ok');
    }
    
    function page($page) {
        $data = array(
            'exception' => '',
            'pagination' => $this->MvtStockDao->getPaginationEntree($this->sizePagination, $this->sizeTable, intval($page)),
            'page' => intval($page),
            'entrees' => $this->MvtStockDao->findAllEntreePage($this->sizeTable, $page)
        );

//        var_dump($data['pagination']);

        $this->load->view('mvtstock/liste_entree', $data);
    }

    function nextPage($last) {
        $data = array(
            'exception' => '',
            'pagination' => $this->MvtStockDao->getPaginationEntree($this->sizePagination, $this->sizeTable, intval($last)),
            'page' => intval($last),
            'entrees' => $this->MvtStockDao->findAllEntreePage($this->sizeTable, $last)
        );
        $this->load->view('mvtstock/liste_entree', $data);
    }

    function previousPage($first) {
        $pagination = $this->MvtStockDao->getPaginationEntree($this->sizePagination, $this->sizeTable, intval($first) - $this->sizePagination);

        $data = array(
            'exception' => '',
            'pagination' => $pagination,
            'page' => $first - 1,
            'entrees' => $this->MvtStockDao->findAllEntreePage($this->sizeTable, intval($first - 1))
        );
        $this->load->view('mvtstock/liste_entree', $data);
    }

    function reinitialiserEntree() {
        $this->session->set_userdata("sousEntree", serialize([]));
        redirect('index.php/entreeStockController');
    }

    function modifierSousEntree($i) {
//        $data = array(
//            'fournisseurs' => $this->BaseService->findAll("fournisseur"),
//            'materiels' => $this->BaseService->findAll("materiel"),
//            'familleMateriel' => $this->BaseService->findAll("famille"),
//            'sousCommande' => unserialize($this->session->userdata("sousEntree")),
//            'exception' => ''
//        );
//
//        $this->load->view("mvtstock/modification_entree", $data);

        echo "modification " . $i;
    }

    function supprimerSousEntree($i) {
//        $data = array(
//            'fournisseurs' => $this->BaseService->findAll("fournisseur"),
//            'materiels' => $this->BaseService->findAll("materiel"),
//            'familleMateriel' => $this->BaseService->findAll("famille"),
//            'sousCommande' => unserialize($this->session->userdata("sousEntree")),
//            'exception' => ''
//        );
//
//        $this->load->view("mvtstock/modification_entree", $data);

        echo "supprimer " . $i;
    }

    function entreeajouter() {
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
                $sousEntree = new SousMvtStockModele();
                $sousEntree->setIdFournisseur($this->input->post("idFournisseur"));
                $sousEntree->setFournisseur($this->input->post("fournisseur"));
                $sousEntree->setIdMateriel($this->input->post("idMateriel"));
                $sousEntree->setMateriel($this->input->post("nommateriel"));

                $sousEntree->setQuantite($this->input->post("quantite"));

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

    function entreenregistrer() {
        $this->load->model('services/MvtStockServices');
        $sousEntrees = unserialize($this->session->userdata("sousEntree"));

        try {
            $toprintCodeBarres = $this->MvtStockServices->enregistrerListeEntree($sousEntrees, $this->input->post("dateMvt"), $this->input->post("commentaire"), $this->session->userdata('id_personnel'));
            $this->session->set_userdata('sousEntree', serialize([]));
            redirect('index.php/entreeStockController/entrees');
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    function bon($idMvtStock) {
        
        $mvtStock = $this->MvtStockDao->findById($idMvtStock);
        $data = array(
            'mvtStock' => $mvtStock,
            'sousMvtStocks' => $this->SousMvtStockDao->findByIdWithCodeBarre($idMvtStock),
            'personnel' => $this->PersonnelViewDao->findPersonnelViewDao($mvtStock->getIdPersonnel()),
        );

//        var_dump($data);
        $this->load->view('pdfs_export/bon_d_entree', $data);
    }

    function entreenregistrerAjax() {
        $this->load->model('services/MvtStockServices');

        try {
            $this->MvtStockServices->enregistrerListeEntree($sousEntrees, $this->input->post("dateMvt"), $this->input->post("commentaire"));
            $this->session->set_userdata('sousEntree', serialize([]));
            echo json_encode("ok");
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

}
