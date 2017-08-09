<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TransfertMaterielService
 *
 * @author MIRADO
 */
class TransfertMaterielService extends BaseService {

    //put your code here
    function __construct() {
        parent::__construct();
        $this->load->model("dao/TransfertDao");
        $this->load->model("dao/RetourDao");
        $this->load->model("dao/DetailTransfertDao");
        $this->load->model("dao/ListeReferenceDao");
    }

    function insertListeReferences($listeReferences) {
        for ($j = 0; $j < count($listeReferences); $j++) {
            $this->ListeReferenceDao->insertReference($listeReferences[$j]);
        }
    }

    public function enregistrerTransferts($detailtransferts, $date, $commentaire) {
        
        try {
            $this->db->trans_start(FALSE);
            
                $transfert = new TransfertModele();
                $transfert->setDateTransfert($date);
                $transfert->setCommentaire($commentaire);
                
              $this->TransfertDao->saveTransfert($transfert);
              
            for ($i = 0; $i < count($detailtransferts); $i++) {

                $this->DetailTransfertDao->saveDetailTransfert($detailtransferts[$i]);
                $listeReferences = $detailtransferts[$i]->getListeReference();
                $this->insertListeReferences($listeReferences);
            }
              
            $this->db->trans_complete();
        } catch (Exception $ex) {
            throw $ex;
        }
    }
    
    function getIdDetailTransfert($reference){
        try {
//            $sql = "INSERT INTO retour_materiel(
//            id_retour_materiel, id_personnel, date_retour, commentaire)
//    VALUES (nextval('retour_materiel_id_retour_materiel_seq'), " . $this->session->userdata("id_personnel") . " , '" . $transferModele->getDateTransfert() . "' , '" . $transferModele->getCommentaire() . "')";
            
            $sql = "INSERT INTO sous_retour(
            id_sous_retour, id_retour_materiel, id_detail_transfert, quantite)
    VALUES (nextval('sous_retour_id_sous_retour_seq'), currval('retour_materiel_id_retour_materiel_seq'), ?, ?)";

            
            $this->db->query($sql);
        } catch (Exception $ex) {
            throw $ex;
        }
    }
    
    function enregistrerRetoursMatériels($sousRetours, $date, $commentaire){
        
        try {
            $this->db->trans_start(FALSE);
                $transfert = new TransfertModele();
                $transfert->setDateTransfert($date);
                $transfert->setCommentaire($commentaire);
                
              $this->RetourDao->saveRetour($transfert);
              
            for ($i = 0; $i < count($sousRetours); $i++) {
                $this->DetailTransfertDao->saveDetailTransfert($detailtransferts[$i]);
//                $listeReferences = $detailtransferts[$i]->getListeReference();
//                $this->insertListeReferences($listeReferences);
            }
              
            $this->db->trans_complete();
            
        } catch (Exception $ex) {
            throw $ex;
        }
    }

}
