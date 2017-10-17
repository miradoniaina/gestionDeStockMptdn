<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SortieDetenteurDao
 *
 * @author MIRADO
 */
class SortieDetenteurDao extends BaseService {

    //put your code here

    function insertDetenteurs($idDetenteurs) {
        
        try {
            
            if($idDetenteurs ===''){
                throw new Exception("Veuillez précisez le ou les détenteur(s)");
            }
            
            $detenteurs = explode(';', $idDetenteurs);
            
            for ($i = 0; $i < count($detenteurs); $i++) {
                $sql = "INSERT INTO sortie_detenteurs(
             id_sortie_interne, id_personnel)
    VALUES ( currval('sortie_usage_interne_id_sortie_interne_seq')  ," . $detenteurs[$i] . ")";

                $this->db->query($sql);
            }
            
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    function findDetenteursByMvt($idMvtStock) {
        $sql = "SELECT 
		nom,
		prenom
			FROM (
			SELECT 
				id_personnel  
				FROM sortie_detenteurs sd 
				JOIN sortie_usage_interne si 
					ON sd.id_sortie_interne = si.id_sortie_interne 
				WHERE si.id_mvt_stock = ? ) detenteur
			JOIN personnel p 
			ON p.id_personnel = detenteur.id_personnel";

        $query = $this->db->query($sql, array($idMvtStock));
        return $query->result();
    }

}
