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
        $this->load->model("modele/SousTransfertModeleView");
    }

    function saveDetailTransfert($detailtransfert) {
        try {
            $sql = "INSERT INTO detail_transfert(
            id_detail_transfert, id_transfert, id_materiel ,quantite)
    VALUES (nextval('detail_transfert_id_detail_transfert_seq'), currval('transfert_id_transfert_seq'), " . $detailtransfert->getIdMateriel() . ", " .$detailtransfert->getQuantite(). ")";
        
            $this->db->query($sql);
        } catch (Exception $ex) {
            throw $ex;
        }
    }
    
    function findAllView(){
        $sql = "SELECT 
		dt.*,
		m.designation,
		(dt.quantite - SUM(CAST((COALESCE(sr.quantite, '0')) AS INTEGER))) qte_restant 
		FROM (
			SELECT 
				* 
				FROM transfert 
			) trans
			LEFT JOIN detail_transfert dt
				ON dt.id_transfert = trans.id_transfert
			LEFT JOIN sous_retour sr
				ON sr.id_detail_transfert = dt.id_detail_transfert
			LEFT JOIN materiel m
				ON m.id_materiel = dt.id_materiel
		GROUP BY dt.id_detail_transfert,m.designation";
        
        $query = $this->db->query($sql)->result();
        
        $rets = [];
        foreach ($query as $row) {
            $ret = new SousTransfertModeleView();
            $ret->setId($row->id_detail_transfert);
            $ret->setIdTransfert($row->id_transfert);
            $ret->setIdMateriel($row->id_materiel);
            $ret->setDesignationMateriel($row->designation);
            $ret->setQuantiteRestant($row->qte_restant);
            
            array_push($rets, $ret);
        }
        
        return $rets;
    }
    
    function findAllViewByIdTransfert($idTransfert){
        $sql = "SELECT 
		dt.*,
		m.designation,
		(dt.quantite - SUM(CAST((COALESCE(sr.quantite, '0')) AS INTEGER))) qte_restant 
		FROM (
			SELECT 
				* 
				FROM transfert 
				WHERE id_transfert= ? 
			) trans
			LEFT JOIN detail_transfert dt
				ON dt.id_transfert = trans.id_transfert
			LEFT JOIN sous_retour sr
				ON sr.id_detail_transfert = dt.id_detail_transfert
			LEFT JOIN materiel m
				ON m.id_materiel = dt.id_materiel
		GROUP BY dt.id_detail_transfert,m.designation";
        
        $query = $this->db->query($sql, array($idTransfert))->result();
        
        $rets = [];
        foreach ($query as $row) {
            $ret = new SousTransfertModeleView();
            $ret->setId($row->id_detail_transfert);
            $ret->setIdTransfert($row->id_transfert);
            $ret->setIdMateriel($row->id_materiel);
            $ret->setDesignationMateriel($row->designation);
            $ret->setQuantiteRestant($row->qte_restant);
            
            array_push($rets, $ret);
        }
        
        return $rets;
    }
    
    function findAllByIdTransfert($idTransfert) {
//        $sql = "SELECT dt.*,m.designation materiel, m.reference_materiel ref_materiel,p.numero numero_porte_source,p1.numero numero_porte_dest FROM detail_transfert dt LEFT JOIN materiel m ON m.id_materiel=dt.id_materiel LEFT JOIN porte p ON p.id_porte = dt.porte_source LEFT JOIN porte p1 ON p1.id_porte = dt.porte_dest WHERE id_transfert = ".$idTransfert;
        $sql = "SELECT 
                    dt.*,
                    m.designation materiel,
                    m.reference_materiel ref_materiel,
                    p.numero numero_porte_source,
                    p1.numero numero_porte_dest 
                
                    FROM 
                        (SELECT 
                            dt.id_detail_transfert, 
                            dt.id_transfert, 
                            dt.id_materiel, 
                            dt.transfert, 
                            dt.type, 
                            dt.date_recuperation,
                            dt.porte_source, 
                            dt.porte_dest, 
                            (dt.quantite - SUM(CAST((COALESCE(sr.quantite, '0')) AS INTEGER))) qte_restant 
                                FROM sous_retour sr 
                                    RIGHT JOIN detail_transfert dt 
                                        ON sr.id_detail_transfert = dt.id_detail_transfert 
                                            WHERE dt.id_transfert = " .$idTransfert. " 
                                            GROUP BY dt.id_detail_transfert) dt
                                            
                LEFT JOIN materiel m ON m.id_materiel=dt.id_materiel
                LEFT JOIN porte p ON p.id_porte = dt.porte_source
                LEFT JOIN porte p1 ON p1.id_porte = dt.porte_dest";
        
        $temp = $this->db->query($sql)->result();
        
        $ret = [];
        
        foreach ($temp as $ligne) {
            $detailTransferts = new DetailTransfertModele(); 
                $detailTransferts->setDateRecuperation($ligne->date_recuperation);
                $detailTransferts->setId($ligne->id_detail_transfert);
                $detailTransferts->setDesignationMateriel($ligne->materiel);
                $detailTransferts->setRefMateriel($ligne->ref_materiel);
                $detailTransferts->setTransfert($ligne->transfert);
                $detailTransferts->setType($ligne->type);
                $detailTransferts->setNumeroPorteSource($ligne->numero_porte_source);
                $detailTransferts->setNumeroPorteDest($ligne->numero_porte_dest);
                
                $detailTransferts->setQteRestant(($ligne->qte_restant));
            array_push($ret, $detailTransferts);
        }
        return $ret;
    }
}
