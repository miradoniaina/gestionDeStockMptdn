<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SortieUsageInterneDao
 *
 * @author MIRADO
 */
class SortieUsageInterneDao extends BaseService{
    //put your code here
    function __construct() {
        parent::__construct();
        $this->load->model("modele/SortieUsageInterneModele");
    }
    
    function insertUsageInterne($sortie){
        $sql = "INSERT INTO sortie_usage_interne(
             id_materiel, id_mvt_stock, id_porte)
    VALUES ( " . $sortie->getIdMateriel() . ", currval('mvt_de_stock_id_mvt_stock_seq') ," . $sortie->getIdPorte() .")";
        
        $this->db->query($sql);
    }
    
//    function findWhereAndEquals($conditions_array) {
//        parent::findWhereAndEquals("code_barre", $conditions_array);
//    }
}
