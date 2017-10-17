<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MaterielDao
 *
 * @author MIRADO
 */
class MaterielDao extends BaseService {
    //put your code here
    function __construct() {
        parent::__construct();
        $this->load->model('modele/MaterielModele');
        $this->load->model('util/Pagination');
    }
    
    
    
    function findAllMateriel(){
        
        $sql = "SELECT "
                . "m.id_materiel, "
                . "m.id_unite, "
                . "u.unite, "
                . "m.id_famille, "
                . "m.reference_materiel, "
                . "m.designation, "
                . "m.details_materiel, "
                . "m.image, "
                . "f.famille "
                . " FROM materiel m "
                . " JOIN unite u "
                . "     ON u.id_unite = m.id_unite "
                . " JOIN famille f "
                . "     ON m.id_famille = f.id_famille "
                . "         ORDER BY m.designation";
        
        $query = $this->db->query($sql);
        
        $result = $query->result(); 
        
        
        return $result;
    }
    
    function findAllMaterielPage($limit, $page){
        $offset = (($page-1) * $limit) - ($page - 1)  ;

        if ($page <= 1) {
            $offset = 0;
        }
        
        $sql = "SELECT "
                . "m.id_materiel"
                . ", m.id_unite"
                . ", u.unite"
                . ", m.id_famille"
                . ", m.reference_materiel"
                . ", m.designation"
                . ", m.details_materiel"
                . ", m.image"
                . ", f.famille"
                . "  FROM materiel m "
                . "     JOIN unite u "
                . "         ON u.id_unite = m.id_unite "
                . "     JOIN famille f "
                . "         ON m.id_famille = f.id_famille"
                . "     ORDER BY m.designation"
                . "             limit ? offset ?";
        
        $query = $this->db->query($sql, array($limit, $offset));
        
        $result = $query->result(); 
        
        $query->free_result();
        
        return $result;
    }
    
    
    function getPaginationMateriel($sizeConfig ,$sizeTable,  $first ){
        $sql = "SELECT count(*) FROM materiel m";
        
        $pagination = new Pagination();
        
        $pagination->setSizeConfig($sizeConfig);
        $pagination->setSizeAll($this->db->query($sql)->result()[0]->count);
        $pagination->setSizePage($sizeTable);
        $pagination->setFirst($first);
        $pagination->calculLast();
        
        return $pagination;
    }
    
    
    
    function findByIdMateriel($id){
        $sql = "SELECT m.id_materiel, m.id_unite, u.unite, m.id_famille, m.reference_materiel, m.designation, m.details_materiel, m.image, f.famille FROM materiel m JOIN unite u ON u.id_unite = m.id_unite JOIN famille f ON m.id_famille = f.id_famille WHERE m.id_materiel = ".$id;
        
        $query = $this->db->query($sql);
        
        $result = $query->result()[0]; 
        
        $query->free_result();
        
        return $result;
    }
    
    function findByIdDetailTransfert($idDetailTransfert){
        $sql = "SELECT 
                tab.id_detail_transfert,
                m.*
                FROM
                (
                        SELECT 
                                *
                                 FROM 
                                 detail_transfert 
                                 WHERE 
                                 id_detail_transfert = ?
                )
                tab
                LEFT JOIN materiel m
                        ON m.id_materiel = tab.id_materiel";
        
        $query = $this->db->query($sql,array($idDetailTransfert)); 
        
        $rets = [];
        
        foreach ($query->result() as $row){
            $ret = new MaterielModele();
            $ret->setDesigation($row->designation);
            $ret->setId($row->id_materiel);
            array_push($rets, $ret);
        }
        
        return $rets[0];
    }
    
    function findByRef($ref){
        try{
            
            $sql = "SELECT * FROM materiel WHERE reference_materiel = '" .$ref. "'";
        
            $query = $this->db->query($sql); 
            
            $ret = [];
            
            $ret = new MaterielModele();
            
            foreach ($query->result() as $row){
               $ret->setDesigation($row->designation);
               $ret->setId($row->id_materiel);
            }
            
            return $ret;
            
            throw new Exception("Ce matériel n'éxiste pas!");
        } catch (Exception $ex) {
            throw $ex;
        }
        
        
        
    }
}
