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

    private $sizeTable = 3;
    private $sizePagination = 4;

    //put your code here
    function __construct() {
        parent::__construct();
        parent::checkLogIn();
        $this->load->model('modele/MvtStockModele');
        $this->load->model('modele/SousMvtStockModele');
        $this->load->model('dao/DirectionDao');
        $this->load->model('dao/PersonnelViewDao');
        $this->load->model('dao/SortieDetenteurDao');
        $this->load->model('dao/ServiceDao');
        $this->load->model('services/MvtStockServices');
        $this->load->library('MyFPDF');
    }

    function index() {
        $data = array(
            'services' => $this->ServiceDao->findAllWithPersonnel(),
            'personnels' => $this->BaseService->findAll('personnel'),
            'departements' => $this->BaseService->findAll("departement"),
            'familleMateriel' => $this->BaseService->findAll("famille"),
            'direction' => $this->DirectionDao->findByDepartement(""),
            'pour' => '',
            'dateValue' => '',
            'dateMvt' => '',
            'commentaire' => '',
            'exception' => ''
        );

        $this->load->view("mvtstock/sortie", $data);
    }

    function sorties() {
        $data = array(
            'exception' => '',
            'sorties' => $this->MvtStockDao->findAllSortiePage($this->sizeTable, 1),
            'page' => 1,
            'pagination' => $this->MvtStockDao->getPaginationSortie($this->sizePagination, $this->sizeTable, 1)
        );
        $this->load->view('mvtstock/liste_sorties', $data);
    }

    function page($page) {
        $data = array(
            'exception' => '',
            'pagination' => $this->MvtStockDao->getPaginationSortie($this->sizePagination, $this->sizeTable, intval($page)),
            'page' => intval($page),
            'sorties' => $this->MvtStockDao->findAllSortiePage($this->sizeTable, $page)
        );

        $this->load->view('mvtstock/liste_sorties', $data);
    }

    function nextPage($last) {
        $data = array(
            'exception' => '',
            'pagination' => $this->MvtStockDao->getPaginationSortie($this->sizePagination, $this->sizeTable, intval($last)),
            'page' => intval($last),
            'sorties' => $this->MvtStockDao->findAllSortiePage($this->sizeTable, $last)
        );

        $this->load->view('mvtstock/liste_sorties', $data);
    }

    function previousPage($first) {

        $pagination = $this->MvtStockDao->getPaginationSortie($this->sizePagination, $this->sizeTable, intval($first) - $this->sizePagination);

        $data = array(
            'exception' => '',
            'pagination' => $pagination,
            'page' => $first - 1,
            'sorties' => $this->MvtStockDao->findAllSortiePage($this->sizeTable, intval($first - 1))
        );
        $this->load->view('mvtstock/liste_sorties', $data);
    }

    function bon($idMvt) {
        $mvtStock = $this->MvtStockDao->findById($idMvt);

        $data = array(
            'mvtStock' => $mvtStock,
            'detenteurs' => $this->SortieDetenteurDao->findDetenteursByMvt($idMvt),
            'sousMvtStocks' => $this->SousMvtStockDao->findByIdWithCodeBarre($idMvt),
            'personnel' => $this->PersonnelViewDao->findPersonnelViewDao($mvtStock->getIdPersonnel())
        );
        $this->load->view('pdfs_export/bon_de_sortie_pdf', $data);
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

        $reference = explode("-", $this->input->post("reference"));

        $conditions = array(
            'reference_materiel' => $reference[0]
        );

        $materiel = $this->BaseService->findWhereAndEquals('materiel', $conditions);

        try {
            if (count($materiel) == 0) {
                throw new Exception("Matériel pas en Stock");
            }

            $sousMvt = new SousMvtStockModele();

            $sousMvt->setIdMateriel($materiel[0]->id_materiel);
            $sousMvt->setMateriel($materiel[0]->designation);

            $sousMvt->setQuantite($this->input->post("quantite"));

            $sousMvt->setListeReference($this->input->post("listereference"));
            array_push($sousSorties, $sousMvt);

            $this->session->set_userdata('sousSortie', serialize($sousSorties));

            $json = array(
                'value' => 'ok'
            );
            echo json_encode($json);
        } catch (Exception $ex) {
            echo $ex->getMessage();
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

        redirect("index.php/sortieStockController/index");
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


        if ($this->form_validation->run() == FALSE) {
            redirect("sortieStockController/index");
        } else {
            redirect("sortieStockController/index");
        }
    }

    public function enregistrerSortie() {

        $sousSorties = unserialize($this->session->userdata("sousSortie"));

//        $sousSortiesPdf = [];
//
//        for($i=0; $i < count($sousSorties) ;$i++){
//            $sousSortiePdf['materiel'] =  $sousSorties[$i]->getMateriel();
//            $sousSortiePdf['quantite'] =  $sousSorties[$i]->getQuantite();
//            array_push($sousSortiesPdf, $sousSortiePdf);
//        }

        try {
            if ($this->input->post("pour") == "Projet") {
                $this->MvtStockServices->enregistrerListeSorties($sousSorties, $this->input->post("dateMvt"), $this->input->post("commentaire"), $this->session->userdata('id_personnel'));
            } else {
                $this->MvtStockServices->enregistrerListeSortiesInterne($sousSorties, $this->input->post("dateMvt"), $this->input->post("porte"), $this->input->post("idDetenteurSorties"), $this->input->post("commentaire"));
            }

//            $datapdf = array(
//                'commentaire' => $this->input->post("commentaire"),
//                'pour' => $this->input->post("pour"),
//                'porte' => $this->input->post("porte"),
//                'detenteurs' => explode(';', $this->input->post("detenteurs")),
//                'sousSorties' => $sousSortiesPdf,
//                'personnel' => $this->PersonnelViewDao->findPersonnelViewDao(3)
//            );
//
//            if ($this->input->post("dateMvt") != '') {
//                $datapdf['dateMvt'] = $this->input->post("dateMvt");
//            } else {
//                $datapdf['dateMvt'] = (new DateTime())->format('d-m-Y');
//            }
//            
//            $this->load->view('pdfs_export/bon_de_sortie_pdf', $datapdf);
//            $this->session->set_userdata('sousSortie', serialize([]));
            echo json_encode();
        } catch (Exception $ex) {
            $data = array(
                'personnels' => $this->BaseService->findAll('personnel'),
                'exception' => $ex->getMessage()
            );
            $this->load->view("mvtstock/sortie", $data);
        }
    }

    public function reinitSessionSortiesAjax() {
        $this->session->set_userdata('sousSortie', serialize([]));
        echo json_encode('ok');
    }

    public function enregistrerSortieAjax() {

        $sousSorties = unserialize($this->session->userdata("sousSortie"));

        try {
            if ($this->input->post("pour") == "Projet") {
                $this->MvtStockServices->enregistrerListeSorties($sousSorties, $this->input->post("dateMvt"), $this->input->post("commentaire"), $this->session->userdata('id_personnel'));
            } else {
                $this->MvtStockServices->enregistrerListeSortiesInterne($sousSorties, $this->input->post("dateMvt"), $this->input->post("porte"), $this->input->post("idDetenteurSorties"), $this->input->post("commentaire"), $this->session->userdata('id_personnel'));
            }
            $this->session->set_userdata("sousSortie", serialize([]));
            echo json_encode("ok");
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

}
