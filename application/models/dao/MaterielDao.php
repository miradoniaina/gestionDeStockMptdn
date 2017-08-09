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
    }
    
    function findAllMateriel(){
        $sql = "SELECT m.id_materiel, m.id_unite, u.unite, m.id_famille, m.reference_materiel, m.designation, m.details_materiel, m.image, f.famille FROM materiel m JOIN unite u ON u.id_unite = m.id_unite JOIN famille f ON m.id_famille = f.id_famille";
        
        $query = $this->db->query($sql);
        
        $result = $query->result(); 
        
        $query->free_result();
        
        return $result;
    }
    
    function findByIdMateriel($id){
        $sql = "SELECT m.id_materiel, m.id_unite, u.unite, m.id_famille, m.reference_materiel, m.designation, m.details_materiel, m.image, f.famille FROM materiel m JOIN unite u ON u.id_unite = m.id_unite JOIN famille f ON m.id_famille = f.id_famille WHERE m.id_materiel = ".$id;
        
        $query = $this->db->query($sql);
        
        $result = $query->result()[0]; 
        
        $query->free_result();
        
        return $result;
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
