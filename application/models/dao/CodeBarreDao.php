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
class CodeBarreDao extends BaseService {

    //put your code here

    function __construct() {
        parent::__construct();
        $this->load->model("modele/CodeBarreModele");
    }

    function insertCodeBarre($entree) {
        $materiel = $this->findById("materiel", $entree->getIdMateriel())[0];

        $sql = "INSERT INTO code_barre(
            id_code_barre, id_materiel, id_sous_mvt_stock, ref_code_barre)
    VALUES (nextval('code_barre_id_code_barre_seq'), " . $entree->getIdMateriel() . ", currval('sous_mvt_de_stock_id_sous_mvt_stock_seq'), '" . $materiel->reference_materiel . "-'||currval('code_barre_id_code_barre_seq'))";

        $query = $this->db->query($sql);
//        $query->free_result();
    }
    
//    function findWhereAndEquals($conditions_array) {
//        parent::findWhereAndEquals("code_barre", $conditions_array);
//    }
    
     function findWhereAndEquals($conditions_array, $nomTable = 'code_barre') {
         return parent::findWhereAndEquals($nomTable, $conditions_array);
     }
}
