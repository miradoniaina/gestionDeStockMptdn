<?php
/**
 * Description of ReferenceSortieDao
 *
 * @author MIRADO
 */
class ReferenceSortieDao extends BaseService{
    //put your code here
    function __construct() {
        parent::__construct();
        $this->load->model("modele/ReferenceModele");
    }
    
    function saveReferenceSortie($referenceSortie){
        try{
            $sql = "INSERT INTO references_sorties(
            id_references_sorties, id_sortie_interne, reference_sortie)
    VALUES (nextval('references_sorties_id_references_sorties_seq'), currval('sortie_usage_interne_id_sortie_interne_seq'), '" . $referenceSortie->getReference() . "')";
            $this->db->query($sql);
            
        } catch (Exception $ex) {
            throw $ex;
        }
    }
}
