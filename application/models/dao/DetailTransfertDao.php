<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DetailTransfertDao
 *
 * @author MIRADO
 */
class DetailTransfertDao extends BaseService {
    //put your code here
    function __construct() {
        parent::__construct();
        $this->load->model("modele/DetailTransfertModele");
    }

    function saveDetailTransfert($detailtransfert) {
        try {
            
            $sql = "INSERT INTO detail_transfert(
            id_detail_transfert, id_transfert, id_materiel, transfert, type, 
            date_recuperation, porte_source, porte_dest, quantite)
    VALUES (nextval('detail_transfert_id_detail_transfert_seq'), currval('transfert_id_transfert_seq'), " . $detailtransfert->getIdMateriel() . ", '" .$detailtransfert->getTransfert() . "', '" .$detailtransfert->getType(). "', 
            '" .$detailtransfert->getDateRecuperation(). "', " .$detailtransfert->getIdPorteSource(). ", " .$detailtransfert->getIdPorteDest(). ", " .$detailtransfert->getQuantite(). ")";
        
            $this->db->query($sql);
        } catch (Exception $ex) {
            throw $ex;
        }
    }
    
    function findAllByIdTransfert($idTransfert) {
        
        $sql = "SELECT dt.*,m.designation materiel,p.numero numero_porte_source,p1.numero numero_porte_dest FROM detail_transfert dt LEFT JOIN materiel m ON m.id_materiel=dt.id_materiel LEFT JOIN porte p ON p.id_porte = dt.porte_source LEFT JOIN porte p1 ON p1.id_porte = dt.porte_dest WHERE id_transfert = ".$idTransfert;
        
        $temp = $this->db->query($sql)->result();
        
        $ret = [];
        
        foreach ($temp as $ligne) {
            $detailTransferts = new DetailTransfertModele(); 
                $detailTransferts->setDateRecuperation($ligne->date_recuperation);
                $detailTransferts->setId($ligne->id_detail_transfert);
                $detailTransferts->setDesignationMateriel($ligne->materiel);
                $detailTransferts->setTransfert($ligne->transfert);
                $detailTransferts->setType($ligne->type);
                $detailTransferts->setNumeroPorteSource($ligne->numero_porte_source);
                $detailTransferts->setNumeroPorteDest($ligne->numero_porte_dest);
                $detailTransferts->setQuantite($ligne->quantite);
                
            array_push($ret, $detailTransferts);
        }
        return $ret;
    }
}
