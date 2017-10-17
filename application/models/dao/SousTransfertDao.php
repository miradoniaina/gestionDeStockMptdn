<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SousTransfertDao
 *
 * @author MIRADO
 */
class SousTransfertDao extends BaseService {

    //put your code here
    function __construct() {
        $this->load->model("modele/SousTransfertModeleView");
    }

    function findByIdTransfert($idTransfert) {
        try{
            $sql = "SELECT 
                        dt.*,
                        m.designation 
                        FROM (
                                SELECT 
                                    *
                                     FROM 
                                     detail_transfert 
                                     WHERE id_transfert= ?
                             ) dt
                        LEFT JOIN materiel m
                                ON m.id_materiel = dt.id_materiel";

            $query = $this->db->query($sql, array($idTransfert))->result();

            $rets = [];
            foreach ($query as $row) {
                $ret = new SousTransfertModeleView();
                $ret->setId($row->id_detail_transfert);
                $ret->setIdTransfert($row->id_transfert);
                $ret->setIdMateriel($row->id_materiel);
                $ret->setQuantite($row->quantite);
                $ret->setDesignationMateriel($row->designation);
                array_push($rets, $ret);
            }
            
            return $rets;
        } catch (Exception $ex) {
            throw $ex;
        }
    }
    
    function findByTransfert($id) {

        try {
            $sql = "SELECT 
                    dt.*,
                    m.designation,
                    p_source.numero p_source,
                    p_dest.numero p_dest
                    FROM (
                            SELECT 
                                    *
                                     FROM 
                                     detail_transfert 
                                     WHERE id_transfert=" . $id . "
                                    ) dt
                            LEFT JOIN materiel m
                                    ON m.id_materiel = dt.id_materiel
                            LEFT JOIN porte p_source
                                    ON p_source.id_porte = dt.porte_source
                            LEFT JOIN porte p_dest
                                    ON p_dest.id_porte = dt.porte_dest";

            $query = $this->db->query($sql)->result();

            $rets = [];
            foreach ($query as $row) {
                $ret = new SousTransfertModeleView();
                $ret->setId($row->id_detail_transfert);
                $ret->setIdTransfert($row->id_transfert);
                $ret->setIdMateriel($row->id_materiel);
                $ret->setTransfert($row->transfert);
                $ret->setType($row->type);
                $ret->setDateRecuperation($row->date_recuperation);
                $ret->setIdPorteSource($row->porte_source);
                $ret->setIdPorteDest($row->porte_dest);
                $ret->setQuantite($row->quantite);
                $ret->setMateriel($row->designation);
                $ret->setPorteSource($row->p_source);
                $ret->setPorteDest($row->p_dest);
                array_push($rets, $ret);
            }
            
            return $rets;
        } catch (Exception $ex) {
            throw $ex;
        }
    }

}
