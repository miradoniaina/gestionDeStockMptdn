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
class DirectionDao extends BaseService {

    //put your code here

    function __construct() {
        parent::__construct();
    }

    function insertCodeBarre($entree) {

        $materiel = $this->findById("materiel", $entree->getIdMateriel());

        $sql = "INSERT INTO code_barre(
            id_code_barre, id_materiel, id_mvt_stock, ref_code_barre)
    VALUES (nextval('code_barre_id_code_barre_seq'), " . $entree->getIdMateriel() . ", currval('mvt_de_stock_id_mvt_stock_seq'), '" . $materiel->reference_materiel . "-'||currval('code_barre_id_code_barre_seq'))";

        $this->db->query($sql);
    }

    function findByDepartement($idDepartement) {
        $sql = "SELECT * FROM direction WHERE id_departement";
        if($idDepartement===""){
            $sql .= " IS NULL";
        }
        else{
            $sql .=" = ".$idDepartement;
        }
        
        return $this->db->query($sql)->result();
    }
}
