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
class AjaxController extends MY_Controller {

    //put your code here
    function __construct() {
        parent::__construct();
        $this->load->model('dao/DirectionDao');
        $this->load->model('services/MaterielServices');
        $this->load->model('modele/SousMvtStockModele');
        $this->load->model('dao/PorteDao');
//        $this->load->model('modele/DetailTransfertModele');
        $this->load->model('modele/DetailRetourReferenceViewModele');
        $this->load->model('services/EtatStockGraphSplineService');
        $this->load->model('services/MvtStockServices');

        
    }

    function rechercheMateriel() {
        $json = array(
            'recherche' => $this->MaterielServices->rechercheMateriel($this->input->post("idfamille"), $this->input->post("materiel"))
        );

        echo json_encode($json);
    }

    function directionParDepartement() {
        $json = array(
            'value' => $this->DirectionDao->findByDepartement($this->input->post("iddepartement"))
        );

        echo json_encode($json);
    }

    function recherchePorte() {
        $json = array(
            'value' => $this->PorteDao->findPorteByDirection($this->input->post("id_direction"))
        );
        echo json_encode($json);
    }

    function ajouterRetourAjax() {
        try {
            $sousRetours = unserialize($this->session->userdata("sousRetours"));

//            $sousRetour = new DetailTransfertModele();
            $sousRetour = new DetailRetourReferenceViewModele();

            $sousRetour->setQuantite($this->input->post("quantite"));
            $sousRetour->setIdDetailTransfert($this->input->post("idDetailTransfert"));

            $sousRetour->setIdMateriel($this->input->post("reference"));

            $sousRetour->setListeReferenceRetour($this->input->post("listereference"), $this->input->post("idDetailTransfert"));


//            $sousRetour->setMaterielByRef($this->input->post("reference"));
//            
//            $sousRetour->setRefMateriel($this->input->post("reference"));
//            $sousRetour->setListeReferenceRetour($this->input->post("listereference"), $this->input->post("idDetailTransfert"));         

            array_push($sousRetours, $sousRetour);

            $this->session->set_userdata("sousRetours", serialize($sousRetours));

            $json = array(
                'value' => 'ok'
            );

            echo json_encode($json);
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    function getGraphs($annee = "") {
        header('Access-Control-Allow-Origin: *');
        echo json_encode($this->EtatStockGraphSplineService->etatAnneEnCour($annee));
    }

    function getFournisseurs() {
        header('Access-Control-Allow-Origin: *');
        echo json_encode($this->BaseService->findAll('fournisseur'));
    }

    function getPersonnels() {
        try {

            header('Access-Control-Allow-Origin: *');
            echo json_encode($this->BaseService->findAll('personnel'));
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    function getPersonnel($id) {
        try {
            header('Access-Control-Allow-Origin: *');
            $data = array(
                'personnel' => $this->BaseService->findById('personnel', $id)
            );
            echo json_encode($data);
        } catch (Exception $ex) {
            $data = array(
                'exception' => $id
            );
            echo json_encode($data);
        }
    }

    function enregistrerSortieAjaxMobile() {
        try {
            header('Access-Control-Allow-Origin: *');

            $reference = explode("-", $this->input->post("reference"));

            $conditions = array(
                'reference_materiel' => $reference[0]
            );
            $materiel = $this->BaseService->findWhereAndEquals('materiel', $conditions);

            if (count($materiel) == 0) {
                throw new Exception("Matériel pas en Stock");
            }

            $sousSorties = [];

            $sousMvt = new SousMvtStockModele();
            $sousMvt->setIdMateriel($materiel[0]->id_materiel);
            $sousMvt->setMateriel($materiel[0]->designation);

            $sousMvt->setQuantite($this->input->post("quantite"));
            $sousMvt->setListeReference($this->input->post("references"));

            array_push($sousSorties, $sousMvt);

            if ($this->input->post("pour") == "Projet") {
                $this->MvtStockServices->enregistrerListeSorties($sousSorties, $this->input->post("date"), $this->input->post('commentaire'), $this->input->post('personnel'));
            } else {
                $this->MvtStockServices->enregistrerListeSortiesInterne($sousSorties, $this->input->post("date"), $this->input->post("porte"), $this->input->post("detenteurs"), $this->input->post("commentaire"), $this->input->post('personnel'));
            }

            $data = array(
                'msg' => 'enregistrement réussie!'
            );

            echo json_encode($data);
        } catch (Exception $ex) {
            $data = array(
                'exception' => $ex->getMessage()
            );
            echo json_encode($data);
        }
    }

    function base_url() {
        $data = array(
            'base_url' => base_url()
        );
        echo json_encode($data);
    }

}
