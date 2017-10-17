<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MaterielServices
 *
 * @author MIRADO
 */
class MaterielServices extends BaseService{
    //put your code here
    function __construct() {
         parent::__construct();
    }
    
    function rechercheMateriel($idFamille, $nomMateriel){
        $sql = "SELECT m.id_materiel,"
                . "m.id_unite, m.reference_materiel, "
                . "m.designation, m.details_materiel, "
                . "f.famille,"
                . " f.id_famille FROM materiel m "
                . "JOIN famille f "
                . "ON m.id_famille=f.id_famille WHERE "
                . "f.id_famille=". $idFamille
                . " AND lower(m.designation) LIKE lower('%".$nomMateriel."%')";
        
        return $this->db->query($sql)->result();
    }
}
