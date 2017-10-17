<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TransfertDao
 *
 * @author MIRADO
 */
class TransfertDao extends BaseService {

    function __construct() {
        parent::__construct();
        $this->load->model("modele/TransfertModele");
        $this->load->model("modele/TransfertModeleView");
        $this->load->model('util/Pagination');
    }

    function saveTransfert($transfert) {
        try {
            $sql = "INSERT INTO transfert(id_transfert, id_personnel, transfert, type, date_transfert, 
            date_recuperation, porte_source, porte_dest, commentaire)
    VALUES (nextval('transfert_id_transfert_seq'), ?, ? , ?, ? , ?, ?, ?, ?)";

            $this->db->query($sql, array($transfert->getIdPersonnel(),
                $transfert->getTransfert(),
                $transfert->getType(),
                $transfert->getDateTransfert(),
                $transfert->getDateRecuperation(),
                $transfert->getIdPorteSource(),
                $transfert->getIdPorteDest(),
                $transfert->getCommentaire()
                    )
            );
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    function findById($id, $nomTable = 'transfert') {
        $ret = parent::findById($nomTable, $id)[0];

        $retf = new TransfertModele();

        $retf->setCommentaire($ret->commentaire);
        $retf->setDateTransfert($ret->date_transfert);
        $retf->setId($ret->id_transfert);
        $retf->setIdPersonnel($ret->id_personnel);
        $retf->setDateRecuperation($ret->date_recuperation);
        $retf->setTransfert($ret->transfert);
        $retf->setType($ret->type);

        return $retf;
    }

    function findByIdViewPorte($id, $nomTable = 'transfert') {
        $sql = "SELECT 
                tab.*,
                ps.numero numero_porte_source,
                pd.numero numero_porte_dest

                 FROM
                 (SELECT 
                        t.* 
                         FROM 
                        transfert t
                        WHERE id_transfert = ?) tab
                LEFT JOIN porte ps
                        ON ps.id_porte = tab.porte_source	
                LEFT JOIN porte pd
                        ON pd.id_porte = tab.porte_dest";

        $rets = [];

        foreach ($this->db->query($sql, array($id))->result() as $row) {
            $ret = new TransfertModeleView();

            $ret->setCommentaire($row->commentaire);
            $ret->setDateTransfert($row->date_transfert);
            $ret->setId($row->id_transfert);
            $ret->setIdPersonnel($row->id_personnel);
            $ret->setDateRecuperation($row->date_recuperation);
            $ret->setNumeroPorteSource($row->numero_porte_source);
            $ret->setNumeroPorteDest($row->numero_porte_dest);
            $ret->setTransfert($row->transfert);
            $ret->setType($row->type);
            array_push($rets, $ret);
        }

        return $rets[0];
    }

    
    function findAllPage($limit, $page) {
        $offset = (($page-1) * $limit) - ($page - 1)  ;

        if ($page <= 1) {
            $offset = 0;
        }
        
        try {
            $sql = "SELECT * FROM transfert ORDER BY date_transfert DESC limit ? offset ?";

            $rets = [];
            foreach ($this->db->query($sql, array($limit, $offset))->result() as $row) {
                $ret = new TransfertModele();
                $ret->setCommentaire($row->commentaire);
                $ret->setId($row->id_transfert);
                $ret->setDateTransfert($row->date_transfert);
                $ret->setIdPersonnel($row->id_personnel);

                array_push($rets, $ret);
            }
            return $rets;
        } catch (Exception $ex) {
            throw $ex;
        }
    }
    
    function getPaginationTransfert($sizeConfig ,$sizeTable,  $first ){
        $sql = "SELECT count(*) FROM transfert";
        
        $pagination = new Pagination();
        
        $pagination->setSizeConfig($sizeConfig);
        $pagination->setSizeAll($this->db->query($sql)->result()[0]->count);
        $pagination->setSizePage($sizeTable);
        $pagination->setFirst($first);
        $pagination->calculLast();
        
//        var_dump($pagination);
        
        return $pagination;
    }

    function findByIdPersonnel($id) {
        try {
            $sql = "SELECT * FROM transfert WHERE id_personnel = " . $id . " ORDER BY date_transfert DESC";
            return $this->db->query($sql)->result();
        } catch (Exception $ex) {
            throw $ex;
        }
    }

}
