<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TransfertFluxMateriel
 *
 * @author MIRADO
 */
class TransfertFluxMateriel extends MY_Controller {

    //put your code here
    function __construct() {
        parent::__construct();
        parent::checkLogIn();
        $this->load->library('form_validation');
        $this->load->model('modele/DetailTransfertModele');
        $this->load->model('services/TransfertMaterielService');
    }

    function index() {
        $sousTransferts = unserialize($this->session->userdata('sousTransferts'));
        
        $data = array(
            'sousTransferts' => $sousTransferts,
            'familleMateriel' => $this->BaseService->findAll('famille'),
            'exception' => ''
        );
        
        if(!empty($this->input->get("porte_source"))){
            $data['porte_source'] = $this->input->get("porte_source");
        }
        
        if(!empty($this->input->get("quantite"))){
            $data['quantite'] = $this->input->get("quantite");
        }
        
        if(!empty($this->input->get("porte_dest"))){
            $data['porte_dest'] = $this->input->get("porte_dest");
        }
        
        if(!empty($this->input->get("type"))){
            $data['type'] = $this->input->get("type");
        }
        
        if(!empty($this->input->get("refmateriel"))){
            $data['refmateriel'] = $this->input->get("refmateriel");
        }
        
        if(!empty($this->input->get("transfert"))){
            $data['transfert'] = $this->input->get("transfert");
        }
        
        if(!empty($this->input->get("recuperation"))){
            $data['recuperation'] = $this->input->get("recuperation");
        }
        
        var_dump($data);
        
        $this->load->view('flux_materiels/transfert_materiel', $data);
    }

    function ajouterTransfert() {
        $sousTransferts = unserialize($this->session->userdata('sousTransferts'));

        $sousTransfert = new DetailTransfertModele();

        $this->form_validation->set_rules('quantite', 'Quantite', 'trim');
        $this->form_validation->set_rules('porte_source', 'Porte Source', 'trim');
        $this->form_validation->set_rules('porte_dest', 'Porte Destinataire', 'trim');
        $this->form_validation->set_rules('transfert', 'Transfert', 'trim');
        $this->form_validation->set_rules('type', 'Type', 'trim');
        $this->form_validation->set_rules('refmateriel', 'Référence Matériel', 'trim');
        $this->form_validation->set_rules('recuperation', 'Date de récupération', 'trim');

        if ($this->form_validation->run() == FALSE) {
            echo $ex->getMessage();
            
        } else {
            try {
                $sousTransfert->setTransfert($this->input->post("transfert"));
                
                if ($this->input->post("porte_source") != "null") {
                    $conditionsPorteSource = array(
                        'numero' => $this->input->post("porte_source")
                    );

                    $porteSource = $this->BaseService->findWhereAndEquals('porte', $conditionsPorteSource);
                    $sousTransfert->setPorteSource($porteSource);
                }

                if ($this->input->post("porte_dest") != "null") {
                    $conditionsPorteDest = array(
                        'numero' => $this->input->post("porte_dest")
                    );

                    $porteDest = $this->BaseService->findWhereAndEquals('porte', $conditionsPorteDest);

                    $sousTransfert->setPorteDest($porteDest);
                }

                if ($this->input->post("refmateriel") != "null") {
                    $reference = explode("-", $this->input->post("refmateriel"));

                    $conditions = array(
                        'reference_materiel' => $reference[0]
                    );

                    $materiel = $this->BaseService->findWhereAndEquals('materiel', $conditions);
                    
                    $sousTransfert->setMateriel($materiel, $this->input->post("transfert"));
                    
                }

                $sousTransfert->setQuantite($this->input->post("quantite"));

                $sousTransfert->setRefMateriel($this->input->post("refmateriel"));

                $sousTransfert->setType($this->input->post("type"));
                
                $sousTransfert->setDateRecuperation($this->input->post("recuperation"));
                
                $sousTransfert->setListeReference($this->input->post("listereference"));
                
                array_push($sousTransferts, $sousTransfert);

                $this->session->set_userdata('sousTransferts', serialize($sousTransferts));

                $json = array(
                    'quantite' => $sousTransfert->getQuantite(),
                    'materiel' => $sousTransfert->getMateriel()
                );
                
                echo json_encode($json);
            } catch (Exception $ex) {
                echo $ex->getMessage();
            }
        }
    }

    function enregistrerTransfert() {
        $this->form_validation->set_rules('dateMvt', 'Date Transfert', 'trim');
        $this->form_validation->set_rules('commentaire', 'Commentaire', 'trim');

        $sousTransferts = unserialize($this->session->userdata('sousTransferts'));

        if (($this->form_validation->run() == FALSE)) {
            $data = array(
                'exception' => ''
            );

            $this->load->view('flux_materiels/transfert_materiel', $data);
            
        } else {
            try {
                $this->TransfertMaterielService->enregistrerTransferts($sousTransferts, $this->input->post("dateMvt"), $this->input->post("commentaire"));
              
                $data = array(
                    'sousTransferts' => [],
                    'exception' => ''
                );

                $this->session->set_userdata('sousTransferts', serialize([]));
                
                redirect('index.php/transfertFluxMateriel/index');
            } catch (Exception $ex) {
                var_dump($ex);
            }
        }
    }
}
