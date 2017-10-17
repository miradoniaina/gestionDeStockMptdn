<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MvtStockDao
 *
 * @author MIRADO
 */
class MvtStockDao extends BaseService {

    function __construct() {
        parent::__construct();
        $this->load->model("modele/MvtStockModele");
        $this->load->model("util/Pagination");
    }

    function insert($mvtStockModele) {
        try {
            $sql = "INSERT INTO mvt_stock(
                        id_mvt_stock, id_personnel, type, date_mvt, commentaire)
                        VALUES (nextval('mvt_stock_id_mvt_stock_seq'), ?, ? , ? , ?)";

            $query = $this->db->query($sql, array($mvtStockModele->getIdPersonnel(), $mvtStockModele->getType(), $mvtStockModele->getDateMvtFormattedToInsert(), $mvtStockModele->getCommentaire()));
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    function findAllEntreePage($limit, $page) {
        try {
            $offset = (($page - 1) * $limit) - ($page - 1);
            if ($page <= 1) {
                $offset = 0;
            }
            
            $sql = "SELECT"
                    . " * "
                    . "FROM"
                    . " mvt_stock "
                    . "WHERE type= ? "
                    . "ORDER BY date_mvt DESC "
                    . "limit ? offset ?";
            
            $query = $this->db->query($sql, array('entrée', $limit, $offset) )->result();

            $rets = [];
            foreach ($query as $row) {
                $ret = new MvtStockModele();
                $ret->setId($row->id_mvt_stock);
                $ret->setDateMvt($row->date_mvt);
                $ret->setCommentaire($row->commentaire);
                array_push($rets, $ret);
            }

            return $rets;
        } catch (Exception $ex) {
            throw $ex;
        }
    }
    
    function getPaginationEntree($sizeConfig, $sizeTable, $first) {
        $sql = "SELECT count(*) count FROM mvt_stock WHERE type = ? ";

        $pagination = new Pagination();

        $pagination->setSizeConfig($sizeConfig);
        $pagination->setSizeAll($this->db->query($sql, 'entrée')->result()[0]->count);
        $pagination->setSizePage($sizeTable);
        $pagination->setFirst($first);
        $pagination->calculLast();

        return $pagination;
    }

    function findAllSortiePage($limit, $page) {
        try {
            $offset = (($page - 1) * $limit) - ($page - 1);

            if ($page <= 1) {
                $offset = 0;
            }

            $sql = "SELECT "
                    . "* "
                    . "FROM "
                    . "mvt_stock "
                    . "WHERE type= ? "
                    . "ORDER BY date_mvt DESC "
                    . "limit ? offset ?";
            $query = $this->db->query($sql, array('sortie', $limit, $offset))->result();

            $rets = [];
            foreach ($query as $row) {
                $ret = new MvtStockModele();
                $ret->setId($row->id_mvt_stock);
                $ret->setDateMvt($row->date_mvt);
                $ret->setCommentaire($row->commentaire);
                array_push($rets, $ret);
            }

            return $rets;
        } catch (Exception $ex) {   
            throw $ex;
        }
    }

    function getPaginationSortie($sizeConfig, $sizeTable, $first) {
        $sql = "SELECT count(*) count FROM mvt_stock WHERE type = ? ";

        $pagination = new Pagination();

        $pagination->setSizeConfig($sizeConfig);
        $pagination->setSizeAll($this->db->query($sql, 'sortie')->result()[0]->count);
        $pagination->setSizePage($sizeTable);
        $pagination->setFirst($first);
        $pagination->calculLast();

        return $pagination;
    }

    function findById($idMvtStock, $nomTable = 'mvt_stock') {
        try {
            $rets = [];

            $query = parent::findById($nomTable, $idMvtStock);

            foreach ($query as $row) {
                $ret = new MvtStockModele();
                $ret->setId($row->id_mvt_stock);
                $ret->setIdPersonnel($row->id_personnel);
                $ret->setDateMvt($row->date_mvt);
                $ret->setCommentaire($row->commentaire);
                array_push($rets, $ret);
            }


            return $rets[0];
        } catch (Exception $ex) {
            throw $ex;
        }
    }

}
