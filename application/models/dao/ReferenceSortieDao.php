<?php

/**
 * Description of ReferenceSortieDao
 *
 * @author MIRADO
 */
class ReferenceSortieDao extends BaseService {

    //put your code here
    function __construct() {
        parent::__construct();
        $this->load->model("modele/ReferenceModele");
    }

    function saveReferenceSortie($referenceSortie) {
        try {
            $sql = "INSERT INTO references_sorties(
            id_references_sorties, id_sortie_interne, reference_sortie)
    VALUES (nextval('references_sorties_id_references_sorties_seq'), currval('sortie_usage_interne_id_sortie_interne_seq'), '" . $referenceSortie->getReference() . "')";
            $this->db->query($sql);
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    function compareReferenceByIdPorte($idPorte ,$reference){
         try {
            $sql = "SELECT 
                        count(*) 
                        FROM(
                                SELECT 
                                        * 
                                                FROM sortie_usage_interne sui
                                                WHERE sui.id_porte = ?
                        ) sui
                                JOIN references_sorties rs 
                                        ON rs.id_sortie_interne = sui.id_sortie_interne
                                WHERE reference_sortie LIKE ?
";
            return $this->db->query($sql, array($idPorte, $reference))->result()[0];
        } catch (Exception $ex) {
            throw $ex;
        }
    }
    
    function getTransfertByReference($reference) {
        try {
            $sql = "SELECT 
                        dt.id_transfert
                        FROM (
                                SELECT 
                                        * 
                                        FROM listes_references lr
                                        WHERE 
                                        lr.reference = ? 
                                        ORDER BY id_reference DESC LIMIT 1
                        ) lr
                        LEFT JOIN detail_transfert dt
                        ON dt.id_detail_transfert = lr.id_detail_transfert";
            
            $ret = $this->db->query($sql, $reference)->result();
            
            if(count($ret)==0){
                throw new Exception("Ce matériel n'appartient pas au MPTDN");
            }
            
            return $ret[0]->id_transfert;
        } catch (Exception $ex) {
            throw $ex;
        }
    }

}
