<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EtatDesMvtsStocks
 *
 * @author MIRADO
 */
class EtatDesMvtsStocksController extends MY_Controller {

    //put your code here
    function __construct() {
        parent::__construct();
        $this->checkLogIn();
        $this->load->model('services/MvtStockServices');
    }

    function index() {
        $data = array(
            'du' => '',
            'jusqua' => '',
            'etats' => [],
            'exception' => ''
        );

        $this->load->view("mvtstock/etat_des_mvts", $data);
    }

    function etat() {
        $du = date_create($this->input->post("du"));
        $jusqua = date_create($this->input->post("jusqua"));

        $data = array(
            'du' => $this->input->post("du"),
            'jusqua' => $this->input->post("jusqua"),
            'etats' => $this->MvtStockServices->etatDesMouvementsStocks($du, $jusqua),
            'exception' => ''
        );

        $this->load->view("mvtstock/etat_des_mvts", $data);
    }

    function exporterExcel() {
        $du = date_create($this->input->post("du"));
        $jusqua = date_create($this->input->post("jusqua"));
        
        $sep = ";";
        $ret = $this->MvtStockServices->etatDesMouvementsStocks($du, $jusqua);
        $guill = '"';
        
        // Instruction 1
        $fp = fopen("etat_mvt_stock.csv", "w+");
        // Instruction 2
        fseek($fp, 0);
        
        fputs($fp, "Etat Des Mouvements Des Stocks du ".$this->input->post("du")." jusqu'a ".$this->input->post("jusqua"));
        fputs($fp, "\r\n");
        fputs($fp, "\r\n");
        fputs($fp, "\r\n");
        // Instruction 3
        fputs($fp, "Reference $sep Materiel $sep Quantite Initiale $sep Entree $sep Sortie $sep Quantite Finale $sep Unite");
        fputs($fp, "\r\n");

        foreach ($ret as $row) {
            fputs($fp, $guill);
            fputs($fp, $row->getReference());
            fputs($fp, $guill);

            fputs($fp, $sep);

            fputs($fp, $guill);
            fputs($fp, $row->getMateriel());
            fputs($fp, $guill);

            fputs($fp, $sep);

            fputs($fp, $guill);
            fputs($fp, $row->getQuantiteInitiale());
            fputs($fp, $guill);

            fputs($fp, $sep);

            fputs($fp, $guill);
            fputs($fp, $row->getEntree());
            fputs($fp, $guill);

            fputs($fp, $sep);


            fputs($fp, $guill);
            fputs($fp, $row->getSortie());
            fputs($fp, $guill);

            fputs($fp, $sep);

            fputs($fp, $guill);
            fputs($fp, $row->getQuantiteFinale());
            fputs($fp, $guill);

            fputs($fp, $sep);

            fputs($fp, $guill);
            fputs($fp, $row->getUnite());
            fputs($fp, $guill);

            fputs($fp, $sep);

            fputs($fp, "\r\n");
        }

        fputs($fp, "\r\n");
        fputs($fp, "\r\n");
        // Instruction 4
        fclose($fp);
        // Instruction 5
        header("location:" . base_url() . "/etat_mvt_stock.csv");
    }
}
