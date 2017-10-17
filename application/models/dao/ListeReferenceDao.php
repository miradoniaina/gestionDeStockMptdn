<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MvtStockDao
 *
 * @author MIRADO
 */
class ListeReferenceDao extends BaseService {

    //put your code here

    function __construct() {
        parent::__construct();
    }

    function insertReference($reference) {
        try {
            $sql = "INSERT INTO listes_references(
            id_reference , id_detail_transfert, reference)
    VALUES (nextval('listes_references_id_reference_seq'), currval('detail_transfert_id_detail_transfert_seq'), '" . $reference->getReference() . "')";
            
            $this->db->query($sql);
        } catch (Exception $ex) {
            throw $ex;
        }
    }
    
    function findByIdDetailTransfert($id) {
        $conditions_array=array(
            'id_detail_transfert' => $id
        );
        
        return parent::findWhereAndEquals('listes_references', $conditions_array);
    }
}
