<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of InventaireDao
 *
 * @author MIRADO
 */
class InventaireDao extends BaseService {

    //put your code here

    function __construct() {
        parent::__construct();
        $this->load->model("modele/InventaireModele");
        $this->load->model("modele/InventaireModeleSplineGraph");
    }
    
    function findAllInventaireByMonthYear($mois , $annee){
        $sql = "SELECT 
            f.id_famille,
            f.famille,
            CAST(COALESCE(stock.quantite_restant, '0') AS INTEGER) quantite_restant
            FROM 
                    famille f
                    LEFT JOIN 
                            (
                                SELECT 
                                entree.id_famille, 
                                entree.quantite_total_entree - CAST(COALESCE(sortie.quantite_total_sortie, '0') AS INTEGER) AS quantite_restant

                                 FROM(
                                        SELECT 
                                        m.id_famille,
                                        sum(smvt.quantite) AS quantite_total_entree
                                            FROM sous_mvt_de_stock smvt
                                                LEFT JOIN mvt_stock stk 
                                                        ON smvt.id_mvt_stock = stk.id_mvt_stock
                                                LEFT JOIN materiel m
                                                        ON m.id_materiel = smvt.id_materiel
                                            WHERE stk.type::text = 'entrée'::text AND (EXTRACT(YEAR FROM stk.date_mvt) <= ? AND EXTRACT(MONTH FROM stk.date_mvt) <= ? )
                                            GROUP BY m.id_famille
                                 ) entree 
                                 LEFT JOIN (
                                        SELECT 
                                            m.id_famille,
                                            sum(smvt.quantite) AS quantite_total_sortie
                                                FROM sous_mvt_de_stock smvt
                                                    LEFT JOIN mvt_stock stk 
                                                        ON smvt.id_mvt_stock = stk.id_mvt_stock
                                                    LEFT JOIN materiel m
                                                        ON m.id_materiel = smvt.id_materiel
                                                    WHERE stk.type::text = 'sortie'::text AND (EXTRACT(YEAR FROM stk.date_mvt) <= ? AND EXTRACT(MONTH FROM stk.date_mvt) <= ? )
                                            GROUP BY m.id_famille
                                 ) sortie
                                        ON entree.id_famille = sortie.id_famille 
                            ) stock
                            ON f.id_famille = stock.id_famille";

        $query = $this->db->query($sql, array($annee, $mois, $annee, $mois));

//        $result = [];
//        foreach ($query->result() as $row) {
//            $inventaire = new InventaireModeleSplineGraph();
//            $inventaire->setId($row->id_famille);
//            $inventaire->setFamille($row->famille);
//            $inventaire->setQuantiteStock($row->quantite_restant);
//
//            array_push($result, $inventaire);
//        }

//        $query->free_result();
        return $query->result();
    }
    
    function findAllInventaire($date) {
        $date_temp = $date->format('Y-m-d H:i:s');
        $sql = "SELECT 
                entree.id_materiel, 
                entree.quantite_total_entree quantite_restant_sans_sortie, 
                entree.quantite_total_entree - sortie.quantite_total_sortie AS quantite_restant, 
                m.reference_materiel, 
                m.designation, 
                u.unite 
                    FROM (
                            SELECT 
                                smvt.id_materiel,
                                sum(smvt.quantite) AS quantite_total_entree
                                    FROM sous_mvt_de_stock smvt
                                        LEFT JOIN mvt_stock stk 
                                        ON smvt.id_mvt_stock = stk.id_mvt_stock
                                    WHERE stk.type::text = 'entrée'::text AND stk.date_mvt <= ?
                                    GROUP BY smvt.id_materiel) entree LEFT JOIN (
                                                                                SELECT 
                                                                                    smvt.id_materiel,
                                                                                    sum(smvt.quantite) AS quantite_total_sortie
                                                                                        FROM sous_mvt_de_stock smvt
                                                                                            LEFT JOIN mvt_stock stk 
                                                                                                ON smvt.id_mvt_stock = stk.id_mvt_stock
                                                                                            WHERE stk.type::text = 'sortie'::text AND stk.date_mvt <= ?
                                                                                    GROUP BY smvt.id_materiel) sortie 
                                                                            ON entree.id_materiel = sortie.id_materiel 
                                                                    JOIN materiel m 
                                                                        ON entree.id_materiel = m.id_materiel 
                                                                    JOIN unite u 
                                                                        ON u.id_unite = m.id_unite";
        
        $query = $this->db->query($sql, array($date_temp, $date_temp));

        $result = [];
        foreach ($query->result() as $row) {
            $inventaire = new InventaireModele();
            $inventaire->setId($row->id_materiel);
            $inventaire->setMateriel($row->designation);

            if ($row->quantite_restant != null) {
                $inventaire->setQuantiteStock($row->quantite_restant);
            } else {
                $inventaire->setQuantiteStock($row->quantite_restant_sans_sortie);
            }

            $inventaire->setReference($row->reference_materiel);
            $inventaire->setUnite($row->unite);

            array_push($result, $inventaire);
        }

        $query->free_result();
        return $result;
    }

    function findAllInventaireByIdMateriel($date, $idMateriel) {
        $sql = "SELECT 
                    entree.id_materiel, 
                    entree.
                    quantite_total_entree quantite_restant_sans_sortie, 
                    entree.quantite_total_entree - sortie.quantite_total_sortie AS quantite_restant, 
                    m.reference_materiel, m.designation, 
                    u.unite
                        FROM (
                            SELECT 
                                    smvt.id_materiel,
                                    sum(smvt.quantite) AS quantite_total_entree
                                       FROM sous_mvt_de_stock smvt
                                       LEFT JOIN mvt_stock stk
                                            ON smvt.id_mvt_stock = stk.id_mvt_stock
                                            WHERE stk.type::text = 'entrée'::text AND stk.date_mvt <= ?
                                            GROUP BY smvt.id_materiel) entree 
                            LEFT JOIN (
                                    SELECT 
                                            smvt.id_materiel,
                                            sum(smvt.quantite) AS quantite_total_sortie
                                            FROM sous_mvt_de_stock smvt
                                            LEFT JOIN mvt_stock stk 
                                                    ON smvt.id_mvt_stock = stk.id_mvt_stock
                                            WHERE stk.type::text = 'sortie'::text AND stk.date_mvt <= ?
                                      GROUP BY smvt.id_materiel) sortie 
                              ON entree.id_materiel = sortie.id_materiel 
                            JOIN materiel m 
                             ON entree.id_materiel = m.id_materiel 
                            JOIN unite u 
                             ON u.id_unite = m.id_unite 
                             WHERE entree.id_materiel = ?";

        $query = $this->db->query($sql, array($date->format('Y-m-d H:i:s'), $date->format('Y-m-d H:i:s'), $idMateriel));

        $result = [];
        foreach ($query->result() as $row) {
            $inventaire = new InventaireModele();
            $inventaire->setId($row->id_materiel);
            $inventaire->setMateriel($row->designation);

            if ($row->quantite_restant != null) {
                $inventaire->setQuantiteStock($row->quantite_restant);
            } else {
                $inventaire->setQuantiteStock($row->quantite_restant_sans_sortie);
            }

            $inventaire->setReference($row->reference_materiel);
            $inventaire->setUnite($row->unite);

            array_push($result, $inventaire);
        }

        $query->free_result();
        return $result;
    }

}
