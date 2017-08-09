<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SortieStockController
 *
 * @author MIRADO
 */
class SortieStockController extends MY_Controller {

    //put your code here
    function __construct() {
        parent::__construct();
        parent::checkLogIn();
        $this->load->model('modele/MvtStockModele');
        $this->load->model('dao/DirectionDao');
    }

    function index() {
        $data = array(
            'personnels' => $this->BaseService->findAll('personnel'),
            'departements' => $this->BaseService->findAll("departement"),
            'direction' => $this->DirectionDao->findByDepartement(""),
            'pour' => '',
            'dateValue' => '',
            'dateMvt' => '',
            'commentaire' => '',
            'exception' => ''
        );
        
        var_dump(unserialize($this->session->userdata("sousSortie")));
        
        $this->load->view("mvtstock/sortie", $data);
    }

    function modifierSortie() {

        $data = array(
//            'sorties' => unserialize($this->session->userdata("sousSortie")),
            'exception' => ''
        );

        $this->load->view("mvtstock/modification_sortie", $data);
    }

    function ajouterSortie() {
        $sousSorties = unserialize($this->session->userdata("sousSortie"));

        $this->load->library('form_validation');

        $this->form_validation->set_rules('reference', 'Reference', 'trim');
        $this->form_validation->set_rules('detenteurs', 'Detenteurs', 'trim');
        $this->form_validation->set_rules('idDetenteurs', 'IdDetenteurs', 'trim');
        $this->form_validation->set_rules('quantite', 'Quantite', 'trim');
        $this->form_validation->set_rules('porte', 'Porte', 'trim');

        $reference = explode("-", $this->input->post("reference"));

        $conditions = array(
            'reference_materiel' => $reference[0]
        );

        $conditionsPorte = array(
            'numero' => $this->input->post("porte")
        );

        $materiel = $this->BaseService->findWhereAndEquals('materiel', $conditions);

        $porte = $this->BaseService->findWhereAndEquals('porte', $conditionsPorte);

        if ($this->form_validation->run() == FALSE) {

            $data = array(
                'personnels' => $this->BaseService->findAll('personnel'),
                'pour' => '',
                'dateValue' => '',
                'dateMvt' => '',
                'commentaire' => '',
                'exception' => $ex->getMessage()
            );

            $this->load->view("mvtstock/sortie", $data);
        } else {
            try {
                if (count($materiel) == 0) {
                    throw new Exception("Matériel pas en Stock");
                }

                $sousMvt = new MvtStockModele();

                if (count($porte) == 0 && $this->input->post("porte") != "") {
                    throw new Exception("La porte insérée n'éxiste pas");
                }

                $sousMvt->setIdMateriel($materiel[0]->id_materiel);
                $sousMvt->setMateriel($materiel[0]->designation);

////           $sousMvt->setPrixUnitaire($idFournisseur);
                $sousMvt->setQuantite($this->input->post("quantite"));
                $sousMvt->setType('sortie');
                $sousMvt->setIdDetenteurs($this->input->post("idDetenteurSorties"));
                $sousMvt->setDetenteurs($this->input->post("detenteurs"));
                $sousMvt->setPorte($this->input->post("porte"));
//                $sousMvt

                if (count($porte) != 0) {
                    $sousMvt->setIdPorte($porte[0]->id_porte);
                }

                array_push($sousSorties, $sousMvt);

                $this->session->set_userdata('sousSortie', serialize($sousSorties));

                $data = array(
                    'personnels' => $this->BaseService->findAll('personnel'),
                    'pour' => '',
                    'dateValue' => '',
                    'dateMvt' => '',
                    'commentaire' => '',
                    'exception' => ''
                );


                redirect("index.php/sortieStockController/index");
            } catch (Exception $ex) {

                $data = array(
                    'personnels' => $this->BaseService->findAll('personnel'),
                    'pour' => '',
                    'dateValue' => '',
                    'dateMvt' => '',
                    'commentaire' => '',
                    'exception' => $ex->getMessage()
                );

                $this->load->view("mvtstock/sortie", $data);
            }
        }
    }

    
    function ajouterSortieAjax() {
        $sousSorties = unserialize($this->session->userdata("sousSortie"));

        $this->load->library('form_validation');

        $this->form_validation->set_rules('reference', 'Reference', 'trim');
//        $this->form_validation->set_rules('detenteurs', 'Detenteurs', 'trim');
//        $this->form_validation->set_rules('idDetenteurs', 'IdDetenteurs', 'trim');
        $this->form_validation->set_rules('quantite', 'Quantite', 'trim');
//        $this->form_validation->set_rules('porte', 'Porte', 'trim');

        $reference = explode("-", $this->input->post("reference"));

        $conditions = array(
            'reference_materiel' => $reference[0]
        );

//        $conditionsPorte = array(
//            'numero' => $this->input->post("porte")
//        );

        $materiel = $this->BaseService->findWhereAndEquals('materiel', $conditions);

//        $porte = $this->BaseService->findWhereAndEquals('porte', $conditionsPorte);

        if ($this->form_validation->run() == FALSE) {

            $data = array(
                'personnels' => $this->BaseService->findAll('personnel'),
                'pour' => '',
                'dateValue' => '',
                'dateMvt' => '',
                'commentaire' => '',
                'exception' => $ex->getMessage()
            );

                echo $ex->getMessage();
                
//            $this->load->view("mvtstock/sortie", $data);
        } else {
            try {
                if (count($materiel) == 0) {
                    throw new Exception("Matériel pas en Stock");
                }

                $sousMvt = new MvtStockModele();

//                if (count($porte) == 0 && $this->input->post("porte") != "") {
//                    throw new Exception("La porte insérée n'éxiste pas");
//                }

                $sousMvt->setIdMateriel($materiel[0]->id_materiel);
                $sousMvt->setMateriel($materiel[0]->designation);

////           $sousMvt->setPrixUnitaire($idFournisseur);
                $sousMvt->setQuantite($this->input->post("quantite"));
                $sousMvt->setType('sortie');
//                $sousMvt->setIdDetenteurs($this->input->post("idDetenteurSorties"));
//                $sousMvt->setDetenteurs($this->input->post("detenteurs"));
//                $sousMvt->setPorte($this->input->post("porte"));
                $sousMvt->setListeReference($this->input->post("listereference"));

//                if (count($porte) != 0) {
//                    $sousMvt->setIdPorte($porte[0]->id_porte);
//                }

                array_push($sousSorties, $sousMvt);

                $this->session->set_userdata('sousSortie', serialize($sousSorties));

                $data = array(
                    'personnels' => $this->BaseService->findAll('personnel'),
                    'pour' => '',
                    'dateValue' => '',
                    'dateMvt' => '',
                    'commentaire' => '',
                    'exception' => ''
                );

                    $json = array(
                      'value' => 'ok'  
                    );
                   echo json_encode($json);
//                redirect("index.php/sortieStockController/index");
            } catch (Exception $ex) {

                $data = array(
                    'personnels' => $this->BaseService->findAll('personnel'),
                    'pour' => '',
                    'dateValue' => '',
                    'dateMvt' => '',
                    'commentaire' => '',
                    'exception' => $ex->getMessage()
                );
                echo $ex->getMessage();
//                $this->load->view("mvtstock/sortie", $data);
            }
        }
    }
    
    
//    public function enregistrer(){
//        
//        $data = array(
//            'exception' => ''
//        );
//        
//        $this->load->view("mvtstock/sortie", $data);
//    }

    function listeSortiesDetails() {

        $this->load->library('form_validation');
        $this->form_validation->set_rules('pour', 'Pour', 'trim');
        $this->form_validation->set_rules('dateValue', 'Date', 'trim');
        $this->form_validation->set_rules('dateMvt', 'Date Hidden', 'trim');
        $this->form_validation->set_rules('commentaire', 'Commentaire', 'trim');

        if ($this->form_validation->run() == FALSE) {
            redirect("sortieStockController/index");
        } else {
            $data = array(
                'pour' => $this->input->post("pour"),
                'dateValue' => $this->input->post("dateValue"),
                'dateMvt' => $this->input->post("dateMvt"),
                'commentaire' => $this->input->post("commentaire"),
                'sorties' => unserialize($this->session->userdata("sousSortie")),
                'exception' => ''
            );
            $this->load->view("mvtstock/listes_sorties_details_session", $data);
        }
    }

    function modifierSousSortie() {
        if (!empty($this->input->post("suppression"))) {
            $this->suppressionSousSortie($this->input->post("indiceSortie"));

            $data = array(
                'pour' => $this->input->post("pour"),
                'dateValue' => $this->input->post("dateValue"),
                'dateMvt' => $this->input->post("dateMvt"),
                'commentaire' => $this->input->post("commentaire"),
                'sorties' => unserialize($this->session->userdata("sousSortie")),
                'exception' => ''
            );
            $this->load->view("mvtstock/listes_sorties_details_session", $data);
        } else {
            $sousSorties = unserialize($this->session->userdata("sousSortie"));

            $sousSortie = $sousSorties[$this->input->post("indiceSortie")];

            $data = array(
                'personnels' => $this->BaseService->findAll('personnel'),
                'indiceSortie' => $this->input->post("indiceSortie"),
                'sousSortie' => $sousSortie,
                'pour' => $this->input->post("pour"),
                'dateValue' => $this->input->post("dateValue"),
                'dateMvt' => $this->input->post("dateMvt"),
                'commentaire' => $this->input->post("commentaire"),
                'exception' => ''
            );

            $this->load->view("mvtstock/modification_sortie", $data);
        }
    }

    function suppressionSousSortie($indice) {
        $sousSorties = unserialize($this->session->userdata("sousSortie"));

        array_splice($sousSorties, $indice, 1);

        $this->session->set_userdata("sousSortie", serialize($sousSorties));

//        redirect("index.php/sortieStockController/index");
    }

    function suppressionSousSortieListes($indice) {
        $sousSorties = unserialize($this->session->userdata("sousSortie"));

        array_splice($sousSorties, $indice, 1);

        $this->session->set_userdata("sousSortie", serialize($sousSorties));

//        redirect("index.php/sortieStockController/listeSortiesDetails");
    }

    function modificationSousSortie() {
        $sousSorties = unserialize($this->session->userdata("sousSortie"));

        $sousSortie = $sousSorties[$this->input->post("indiceSousSortie")];

        $sousSortie->setQuantite($this->input->post("quantite"));
        $sousSortie->setPorte($this->input->post("porte"));
        $sousSortie->setDetenteurs($this->input->post("detenteur"));
        $sousSortie->setIdDetenteurs($this->input->post("idDetenteurSorties"));

        $this->session->set_userdata("sousSortie", serialize($sousSorties));


        $this->load->library('form_validation');
        $this->form_validation->set_rules('pour', 'Pour', 'trim');
        $this->form_validation->set_rules('dateValue', 'Date', 'trim');
        $this->form_validation->set_rules('dateMvt', 'Date Hidden', 'trim');
        $this->form_validation->set_rules('commentaire', 'Commentaire', 'trim');


        if ($this->form_validation->run() == FALSE) {
            redirect("sortieStockController/index");
        } else {
            $data = array(
                'pour' => $this->input->post("pour"),
                'dateValue' => $this->input->post("dateValue"),
                'dateMvt' => $this->input->post("dateMvt"),
                'commentaire' => $this->input->post("commentaire"),
                'sorties' => unserialize($this->session->userdata("sousSortie")),
                'exception' => ''
            );
            $this->load->view("mvtstock/listes_sorties_details_session", $data);
        }
    }

    public function enregistrerSortie() {
        $this->load->model('services/MvtStockServices');
        $sousSorties = unserialize($this->session->userdata("sousSortie"));

        try {
            if ($this->input->post("pour") == "Projet") {
                $this->MvtStockServices->enregistrerListeSorties($sousSorties, $this->input->post("dateMvt"), $this->input->post("commentaire"));
            } else {
                $this->MvtStockServices->enregistrerListeSortiesInterne($sousSorties, $this->input->post("dateMvt"), $this->input->post("porte") , $this->input->post("detenteurs") , $this->input->post("idDetenteurSorties"), $this->input->post("commentaire"));
            }

            $this->session->set_userdata('sousSortie', serialize([]));

            $data = array(
                'personnels' => $this->BaseService->findAll('personnel'),
                'exception' => ''
            );

            $this->load->view("mvtstock/sortie", $data);
        } catch (Exception $ex) {

            $data = array(
                'personnels' => $this->BaseService->findAll('personnel'),
                'exception' => $ex->getMessage()
            );
            $this->load->view("mvtstock/sortie", $data);
        }
    }

}
