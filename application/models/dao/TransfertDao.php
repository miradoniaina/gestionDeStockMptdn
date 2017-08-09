<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TransfertDao
 *
 * @author MIRADO
 */
class TransfertDao extends BaseService {

    function __construct() {
        parent::__construct();
        $this->load->model("modele/TransfertModele");
    }

    function saveTransfert($transfert) {
        try {
            $sql = "INSERT INTO transfert(
            id_transfert, id_personnel, date_transfert, commentaire)
    VALUES (nextval('transfert_id_transfert_seq'), " .$this->session->userdata("id_personnel"). " , '" .$transfert->getDateTransfert(). "' , '" .$transfert->getCommentaire(). "')";
            
            $this->db->query($sql);
            
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    function findById($table,  $id) {
        $ret = parent::findById($table, $id)[0];
        
        $retf = new TransfertModele();
        
        $retf->setCommentaire($ret->commentaire);
        $retf->setDateTransfert($ret->date_transfert);
        $retf->setId($ret->id_transfert);
        $retf->setIdPersonnel($ret->id_personnel);
        
        return $retf;
    }
    
    function findByIdPersonnel($id) {
        try{
            $sql = "SELECT * FROM transfert WHERE id_personnel = " . $id ." ORDER BY date_transfert DESC";
            return $this->db->query($sql)->result();
        } catch (Exception $ex) {
            throw $ex;
        }
    }
}
