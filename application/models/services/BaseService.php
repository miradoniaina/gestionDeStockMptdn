<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of BaseService
 *
 * @author MIRADO
 */
class BaseService extends CI_Model {

    //put your code here
    function __construct() {
        parent::__construct();
    }

    function setClePrimaire($nomTable) {
        return "id_" . $nomTable;
    }

    public function count($nomTable){
        try {
            $sql = "SELECT count(*) count FROM ".$nomTable;

            $query = $this->db->query($sql);
            
            return $query->result()[0]->count;
        } catch (Exception $ex) {
            throw $ex;
        }
    }
    
    public function findById($nomTable, $id) {
        $this->db->where($this->setClePrimaire($nomTable), $id);
        return $this->db->get($nomTable)->result();
    }

     public function findByIdView($nomTable, $idCondition , $idVal) {
        $this->db->where($idCondition, $idVal);
        return $this->db->get($nomTable)->result()[0];
    }
    
    public function findWhereAndEquals($nomTable, $conditions_array) {
        $this->db->where($conditions_array);
        return $this->db->get($nomTable)->result();
    }

    public function findAll($nomTable) {
        return $this->db->get($nomTable)->result();
    }

    public function save($nomTable, $array) {
          return $this->db->insert($nomTable, $array);
    }

    public function update($nomTable, $array_update, $id_where) {
        $this->db->where($this->setClePrimaire($nomTable), $id_where);
        $this->db->update($nomTable, $array_update);
    }

    public function delete($nomTable, $id) {
        error_reporting(0);
        
        try {
            if(!$this->db->delete($nomTable, array($this->setClePrimaire($nomTable) . '' => $id))){
                throw new Exception("Suppression interdit");
            }  
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    public function do_upload($userfile) {
        $config['upload_path'] = './assets/images/materiels';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 2048;
        $config['max_width'] = 0;
        $config['max_height'] = 0;

        $this->load->library('upload', $config);
        
        if (!$this->upload->do_upload($userfile)) {
//            return $this->upload->display_errors();
              return false;
        } else {
            return $this->upload->data();
        }
    }
    
    public function my_do_upload($userfile, $url) {
        $config['upload_path'] = '.'.$url;
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 2048;
        $config['max_width'] = 0;
        $config['max_height'] = 0;

        $this->load->library('upload', $config);
        
        if (!$this->upload->do_upload($userfile)) {
//            return $this->upload->display_errors();
              return false;
        } else {
            return $this->upload->data();
        }
    }
    
}
