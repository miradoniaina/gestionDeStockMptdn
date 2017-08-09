<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EtatDesMouvementsStocksDao
 *
 * @author MIRADO
 */
class PorteDao extends BaseService {

    //put your code here

    function __construct() {
        parent::__construct();
    }

    function findPorteByDirection($id_direction){
        $sql = "SELECT * FROM porte WHERE ";
        
        if($id_direction===""){
            $sql.=" id_direction IS NULL";
        }else{
            $sql.= " id_direction = ".$id_direction;
        }
        
        return $this->db->query($sql)->result();
    }
}
