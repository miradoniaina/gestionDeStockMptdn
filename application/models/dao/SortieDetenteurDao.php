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

    function insertDetenteurs($sortie) {

        $detenteurs = explode(';', $sortie->getIdDetenteurs());

        for ($i = 0; $i < count($detenteurs); $i++) {
            $sql = "INSERT INTO sortie_detenteurs(
             id_sortie_interne, id_personnel)
    VALUES ( currval('sortie_usage_interne_id_sortie_interne_seq')  ," . $detenteurs[$i] . ")";

            $this->db->query($sql);
        }
    }

}
