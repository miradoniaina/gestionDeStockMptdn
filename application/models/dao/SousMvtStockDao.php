<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SousMvtStockDao
 *
 * @author MIRADO
 */


class SousMvtStockDao extends BaseService {

    //put your code here

    function __construct() {
        parent::__construct();
        $this->load->model("dao/CodeBarreDao");
    }

    function insertMvt($mvtModele) {
        try {
            $sql = "INSERT INTO sous_mvt_de_stock(
                    id_sous_mvt_stock, id_materiel, id_fournisseur, 
                    id_mvt_stock , quantite)
                    VALUES (nextval('sous_mvt_de_stock_id_sous_mvt_stock_seq'), " . $mvtModele->getIdMateriel() . ", " . $mvtModele->getIdFournisseur() . ", currval('mvt_stock_id_mvt_stock_seq') , 
            " . doubleval($mvtModele->getQuantite()) . ")";
            $this->db->query($sql);
            
            
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    function findByIdWithCodeBarre($idMvt) {

        $codeBarreDao = new CodeBarreDao();

        $sql = "SELECT * FROM mvt_stock_materiel_view WHERE id_mvt_stock = ?";
        
        $query = $this->db->query($sql, array($idMvt));

        $ret = [];

        foreach ($query->result() as $ligne) {
            $reti = new SousMvtStockModele();
            $reti->setId($ligne->id_sous_mvt_stock);
//            $reti->setCommentaire($ligne->commentaire);
//            $reti->setDateMvt($ligne->date_mvt);
            $reti->setIdFournisseur($ligne->id_fournisseur);

            $reti->setIdMateriel($ligne->id_materiel);
            $reti->setMateriel($ligne->designation);
//            $reti->setPrixUnitaire($ligne->prix_unitaire);
            $reti->setQuantite($ligne->quantite);
//            $reti->setType($ligne->type);

            $conditions_array = array(
                'id_sous_mvt_stock' => $ligne->id_sous_mvt_stock
            );

            $reti->setCodebarres($codeBarreDao->findWhereAndEquals($conditions_array));

            array_push($ret, $reti);
        }
        
        return $ret;
    }
}
