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
class MvtStockDao extends BaseService {

    //put your code here

    function __construct() {
        parent::__construct();
        $this->load->model("dao/CodeBarreDao");
    }

    function insertMvt($mvtModele) {
        try {
            $sql = "INSERT INTO mvt_de_stock(
            id_mvt_stock, id_materiel, id_sortie_interne, id_fournisseur, 
            quantite, type, date_mvt, commentaire)
    VALUES (nextval('mvt_de_stock_id_mvt_stock_seq'), " . $mvtModele->getIdMateriel() . ", null, " . $mvtModele->getIdFournisseur() . ", 
            " . doubleval($mvtModele->getQuantite()) . ", '" . $mvtModele->getType() . "' ,'" . $mvtModele->getDateMvt()->format('Y-m-d H:i:s') . "', '" . $mvtModele->getCommentaire() . "')";

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
            $reti = new MvtStockModele();
            $reti->setId($ligne->id_mvt_stock);
            $reti->setCommentaire($ligne->commentaire);
            $reti->setDateMvt($ligne->date_mvt);
            $reti->setIdFournisseur($ligne->id_fournisseur);

            $reti->setIdMateriel($ligne->id_materiel);
            $reti->setMateriel($ligne->designation);
//            $reti->setPrixUnitaire($ligne->prix_unitaire);
            $reti->setQuantite($ligne->quantite);
            $reti->setType($ligne->type);

            $conditions_array = array(
                'id_mvt_stock' => $idMvt
            );

            $reti->setCodebarres($codeBarreDao->findWhereAndEquals("code_barre", $conditions_array));

            array_push($ret, $reti);
        }
        $query->free_result();
        return $ret[0];
    }

}
