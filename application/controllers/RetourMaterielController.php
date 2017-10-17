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
    private $sizeTable = 3;
    private $sizePagination = 4;
    
    //put your code here
    function __construct() {
        parent::__construct();
        $this->checkLogIn();
        $this->load->model("modele/DetailTransfertModele");
        $this->load->model("services/TransfertMaterielService");
        $this->load->model("dao/ReferenceSortieDao");
        $this->load->model('dao/DetailTransfertViewDao');
        $this->load->model('dao/DetailTransfertDao');
        $this->load->model('dao/TransfertDao');
        $this->load->model('modele/DetailRetourReferenceViewModele');
    }

    function index() {
        $data = array(
            'page' => 1,
            'transferts' => $this->TransfertDao->findAllPage($this->sizeTable,1),
            'pagination' => $this->TransfertDao->getPaginationTransfert($this->sizePagination, $this->sizeTable, 1),
//            'mes_transfert' => $this->TransfertDao->findByIdPersonnel($this->session->userdata("id_personnel")),
//            'sousRetours' => unserialize($this->session->userdata('sousRetours')),
            'exception' => ''
        );
        $this->load->view("flux_materiels/retour_materiel/retour_materiel", $data);
    }

     function page($page){
        $data = array(
            'page' => intval($page),
            'transferts' => $this->TransfertDao->findAllPage($this->sizeTable,$page),
            'pagination' => $this->TransfertDao->getPaginationTransfert($this->sizePagination, $this->sizeTable, intval($page)),
            'exception' => '',
        );
       
        $this->load->view("flux_materiels/retour_materiel/retour_materiel", $data);
    }
    
    function nextPage($last){
        $data = array(
            'page' => intval($last),
            'transferts' => $this->TransfertDao->findAllPage($this->sizeTable,$last),
            'pagination' => $this->TransfertDao->getPaginationTransfert($this->sizePagination, $this->sizeTable, intval($last)),
            'exception' => ''
        );

        $this->load->view("crud/liste_materiel", $data);
    }
    
    function previousPage($first){
        
        $pagination = $this->TransfertDao->getPaginationTransfert($this->sizePagination, $this->sizeTable, intval($first) - $this->sizePagination );
        
        $data = array(
            'page' => $first - 1,
            'transferts' => $this->TransfertDao->findAllPage($this->sizeTable,intval($first - 1)),
            'pagination' => $pagination,
            'exception' => '',
        );
        $this->load->view("crud/liste_materiel", $data);
    }
    
    function valider() {
        $id = $this->ReferenceSortieDao->getTransfertByReference($this->input->post("reference"));
        redirect("index.php/retourMaterielController/detailRetourMateriel/" . $id);
    }

    function reinit(){
        $this->session->set_userdata('sousRetours', serialize([]));
        redirect('index.php/retourMaterielController');
    }
    
    function detailRetourMateriel($idTransfert) {
        $data = array(
            'transfert' => $this->TransfertDao->findByIdViewPorte($idTransfert),
            'transferts' => $this->DetailTransfertDao->findAllViewByIdTransfert($idTransfert),
            'retours' => unserialize($this->session->userdata('sousRetours')),
            'exception' => ''
        );
        
        $this->load->view("flux_materiels/retour_materiel/detailTransfert", $data);
    }

    function enregistrer() {
        try {

            $sousRetours = unserialize($this->session->userdata('sousRetours'));

            $this->TransfertMaterielService->enregistrerRetoursMatériels($sousRetours, $this->input->post("dateMvt"), $this->input->post("commentaire") ,$this->session->userdata('id_personnel'));

            $this->session->set_userdata("sousRetours", serialize([]));

            $idTransfert = $this->input->post("idTransfert");

            redirect('index.php/retourMaterielController/detailRetourMateriel/'.$idTransfert);
        } catch (Exception $ex) {
            
            echo $ex->getMessage();
//            $idTransfert = $this->input->post("idTransfert");
//
//            $data = array(
//                'transfert' => $this->TransfertDao->findById("transfert", $idTransfert),
//                'transferts' => $this->DetailTransfertDao->findAllByIdTransfert($idTransfert),
//                'retours' => unserialize($this->session->userdata('sousRetours')),
//                'exception' => $ex->getMessage()
//            );
//
//            $this->load->view("flux_materiels/retour_materiel/detailTransfert", $data);
        }
    }
}
