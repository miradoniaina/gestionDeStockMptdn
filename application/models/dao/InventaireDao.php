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
    }

    function findAllInventaire($date) {
        $sql = "SELECT entree.id_materiel, entree.quantite_total_entree quantite_restant_sans_sortie, 
    entree.quantite_total_entree - sortie.quantite_total_sortie AS quantite_restant, m.reference_materiel, m.designation, u.unite
    FROM (SELECT mvt.id_materiel,
    sum(mvt.quantite) AS quantite_total_entree
   FROM mvt_de_stock mvt
  WHERE mvt.type::text = 'entrée'::text AND mvt.date_mvt <= ?
  GROUP BY mvt.id_materiel) entree LEFT JOIN (SELECT mvt.id_materiel,
    sum(mvt.quantite) AS quantite_total_sortie
   FROM mvt_de_stock mvt
  WHERE mvt.type::text = 'sortie'::text AND mvt.date_mvt <= ?
  GROUP BY mvt.id_materiel) sortie ON entree.id_materiel = sortie.id_materiel JOIN materiel m ON entree.id_materiel = m.id_materiel JOIN unite u ON u.id_unite = m.id_unite";

        $query = $this->db->query($sql, array($date->format('Y-m-d H:i:s'), $date->format('Y-m-d H:i:s')));

//        echo $query->result_id->queryString ;

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
        $sql = "SELECT entree.id_materiel, entree.quantite_total_entree quantite_restant_sans_sortie, 
    entree.quantite_total_entree - sortie.quantite_total_sortie AS quantite_restant, m.reference_materiel, m.designation, u.unite
    FROM (SELECT mvt.id_materiel,
    sum(mvt.quantite) AS quantite_total_entree
   FROM mvt_de_stock mvt
  WHERE mvt.type::text = 'entrée'::text AND mvt.date_mvt <= ?
  GROUP BY mvt.id_materiel) entree LEFT JOIN (SELECT mvt.id_materiel,
    sum(mvt.quantite) AS quantite_total_sortie
   FROM mvt_de_stock mvt
  WHERE mvt.type::text = 'sortie'::text AND mvt.date_mvt <= ?
  GROUP BY mvt.id_materiel) sortie ON entree.id_materiel = sortie.id_materiel JOIN materiel m ON entree.id_materiel = m.id_materiel JOIN unite u ON u.id_unite = m.id_unite WHERE entree.id_materiel = " .$idMateriel;

        $query = $this->db->query($sql, array($date->format('Y-m-d H:i:s'), $date->format('Y-m-d H:i:s')));

//        echo $query->result_id->queryString ;

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
