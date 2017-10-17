<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ServiceDao
 *
 * @author MIRADO
 */
class ServiceDao extends BaseService {

    //put your code here
    function __construct() {
        parent::__construct();
        $this->load->model("modele/ServiceModele");
    }

    function findAllWithPersonnel() {
        try {
            $sql = "SELECT * FROM services";
            
            $query = $this->db->query($sql);
            $rets = [];
            foreach ($query->result() as $row) {
                $ret = new ServiceModele();
                $ret->setId($row->id_service);
                $ret->setService($row->service);
                
                $conditions = array(
                    'id_service' => $row->id_service
                );
                
                $ret->setPersonnels($this->findWhereAndEquals('personnel', $conditions));
                array_push($rets, $ret);
            }
            return $rets;
        } catch (Exception $ex) {
            throw $ex;
        }
    }

}
