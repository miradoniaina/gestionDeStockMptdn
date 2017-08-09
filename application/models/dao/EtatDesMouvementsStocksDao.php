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
class EtatDesMouvementsStocksDao extends BaseService {

    //put your code here

    function __construct() {
        parent::__construct();
        $this->load->model("modele/EtatDesMouvementsDesStocksModele");
    }

    function findEtatDesMouvementsStocks($date1, $date2) {
        $sql = "SELECT entree.id_materiel, m.reference_materiel, m.designation,
    (entree.quantite_total_entree - CAST((COALESCE(sortie.quantite_total_sortie, '0')) AS INTEGER)) AS quantite_initiale ,
     CAST((COALESCE(etat_entree.entree, '0')) AS INTEGER) entree, 
     CAST((COALESCE(etat_sortie.sortie, '0')) AS INTEGER) sortie, 
     (((entree.quantite_total_entree - CAST((COALESCE(sortie.quantite_total_sortie, '0')) AS INTEGER)) + CAST((COALESCE(etat_entree.entree, '0')) AS INTEGER)) - CAST((COALESCE(etat_sortie.sortie, '0')) AS INTEGER)) quantite_finale , 
     u.unite  
    FROM (SELECT mvt.id_materiel,
    sum(mvt.quantite) AS quantite_total_entree
   FROM mvt_de_stock mvt
  WHERE mvt.type::text = 'entrée'::text AND mvt.date_mvt <= ?
  GROUP BY mvt.id_materiel) entree LEFT JOIN (SELECT mvt.id_materiel,
    sum(mvt.quantite) AS quantite_total_sortie
   FROM mvt_de_stock mvt
  WHERE mvt.type::text = 'sortie'::text AND mvt.date_mvt <= ?
  GROUP BY mvt.id_materiel) sortie ON entree.id_materiel = sortie.id_materiel 
LEFT JOIN materiel m ON entree.id_materiel = m.id_materiel LEFT JOIN unite u ON u.id_unite = m.id_unite LEFT JOIN (SELECT 
    mvt.id_materiel, sum(mvt.quantite) AS entree
   FROM mvt_de_stock mvt
  WHERE mvt.type::text = 'entrée'::text AND mvt.date_mvt >= ? AND mvt.date_mvt <= ?  GROUP BY mvt.id_materiel) AS etat_entree ON etat_entree.id_materiel = entree.id_materiel LEFT JOIN (SELECT mvt.id_materiel,
    sum(mvt.quantite) AS sortie
   FROM mvt_de_stock mvt
  WHERE mvt.type::text = 'sortie'::text AND mvt.date_mvt >= ? AND mvt.date_mvt <= ? GROUP BY mvt.id_materiel) AS etat_sortie ON etat_sortie.id_materiel = entree.id_materiel";

        $query = $this->db->query($sql, array($date1->format('Y-m-d'), $date1->format('Y-m-d'), $date1->format('Y-m-d'), $date2->format('Y-m-d'), $date1->format('Y-m-d'), $date2->format('Y-m-d')));


        $result = [];
        foreach ($query->result() as $row) {
            $etats = new EtatDesMouvementsDesStocksModele();
            $etats->setReference($row->reference_materiel);
            $etats->setMateriel($row->designation);
            $etats->setId($row->id_materiel);
            
            if($row->quantite_initiale!=null){
                $etats->setQuantiteInitiale($row->quantite_initiale);
            }
            else{
                $etats->setQuantiteInitiale($row->entree_initiale);
            }
            
            if($row->entree!=null){
                $etats->setEntree($row->entree);
            }else{
                $etats->setEntree($row->entree);
            }
            
            
            $etats->setSortie($row->sortie);
            
            if($row->quantite_finale!=null){
               $etats->setQuantiteFinale($row->quantite_finale);
            }else{
               $etats->setQuantiteFinale($row->quantite_finale_pas_de_sortie);
            }
            $etats->setUnite($row->unite);
            
            array_push($result, $etats);
        }
        
        $query->free_result();
        
        return $result;
    }

}
