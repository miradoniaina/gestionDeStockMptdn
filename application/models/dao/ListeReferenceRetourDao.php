<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ListeReferenceRetourDao
 *
 * @author MIRADO
 */
class ListeReferenceRetourDao extends BaseService {

    //put your code here
    function __construct() {
        parent::__construct();
        $this->load->model("modele/ReferenceModele");
    }

    function saveReferenceRetour($referenceRetourModele) {
        try {
            $sql = "INSERT INTO listes_references_retour(
            id_reference_retour, id_sous_retour, reference)
    VALUES (nextval('listes_references_retour_id_reference_retour_seq'), currval('sous_retour_id_sous_retour_seq'), '" .$referenceRetourModele->getReference(). "')";
            $this->db->query($sql);
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    function findAllRetourByIdDetailTransfert($idDetailTransfert) {
        try{
            $sql = "SELECT lsr.* FROM 
	(SELECT sr.id_sous_retour, sr.id_detail_transfert FROM sous_retour sr 
		WHERE (sr.id_detail_transfert = " . $idDetailTransfert . ")) sr 
LEFT JOIN detail_transfert dt 
ON sr.id_detail_transfert = dt.id_detail_transfert 
LEFT JOIN listes_references_retour lsr 
ON lsr.id_sous_retour = sr.id_sous_retour";
            
            return $this->db->query($sql)->result();
        } catch (Exception $ex) {
            throw $ex;
        }
    }
}
