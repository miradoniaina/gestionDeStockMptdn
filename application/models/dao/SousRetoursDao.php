<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SousRetoursDao
 *
 * @author MIRADO
 */
class SousRetoursDao extends BaseService {
    //put your code here
    function __construct() {
        parent::__construct();
        $this->load->model("modele/DetailTransfertModele");
    }
    
    function saveSousRetour($detailTransfertModele){
        try {
            $sql = "INSERT INTO sous_retour(
            id_sous_retour, id_retour_materiel, id_detail_transfert, quantite)
    VALUES (nextval('sous_retour_id_sous_retour_seq'), currval('retour_materiel_id_retour_materiel_seq'), " .$detailTransfertModele->getIdDetailTransfert(). ", " .$detailTransfertModele->getQuantite(). ")";

            $this->db->query($sql);
        } catch (Exception $ex) {
            throw $ex;
        }
    }
}
