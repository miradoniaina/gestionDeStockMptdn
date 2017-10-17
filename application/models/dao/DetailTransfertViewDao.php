<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DetailTransfertViewDao
 *
 * @author MIRADO
 */
class DetailTransfertViewDao extends BaseService {
    //put your code here
    function __construct() {
        parent::__construct();
    }
    
    function findTransfertsAll() {
        try{
            $sql = "SELECT m.designation ,"
                    . " df.*,"
                    . " p.numero porte_source,"
                    . " p1.numero porte_dest, "
                    . "pers.prenom  "
                    . "FROM detail_transfert df "
                    . "JOIN materiel m "
                    . "ON df.id_materiel = m.id_materiel "
                    . "LEFT JOIN porte p "
                    . "ON p.id_porte = df.porte_source "
                    . "LEFT JOIN porte p1 "
                    . "ON p1.id_porte = df.porte_dest "
                    . "LEFT JOIN transfert tr "
                    . "ON df.id_transfert = tr.id_transfert "
                    . "LEFT JOIN personnel pers "
                    . "ON tr.id_personnel = pers.id_personnel ORDER BY df.date_recuperation DESC";
            
            return $this->db->query($sql)->result();
            
        }catch (Exception $ex) {
            throw $ex;
        }
    }
}
