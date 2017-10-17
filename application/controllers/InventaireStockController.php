<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of InventaireStockController
 *
 * @author MIRADO
 */
class InventaireStockController extends MY_Controller {

    //put your code here
    function __construct() {
        parent::__construct();
        $this->checkLogIn();
        $this->load->model('dao/InventaireDao');
    }

    function index() {

        $data = array(
            'date' => (new DateTime())->format('d-m-Y'),
            'inventaires' => $this->InventaireDao->findAllInventaire(new DateTime()),
            'exception' => ''
        );

        $this->load->view("mvtstock/inventaire_stock", $data);
    }

    function inventaire() {
        $date = date_create($this->input->post("dateMvt"));

        try {
            $data = array(
                'date' => $date->format("d-m-Y"),
                'inventaires' => $this->InventaireDao->findAllInventaire(new DateTime(date_format($date, "Y-m-d H:i:s"))),
                'exception' => ''
            );

            $this->load->view("mvtstock/inventaire_stock", $data);
        } catch (Exception $ex) {
            $data = array(
                'date' => (new DateTime())->format('d-m-Y H:i:s'),
                'inventaires' => $this->InventaireDao->findAllInventaire(new DateTime()),
                'exception' => $ex->getMessage()
            );

            $this->load->view("mvtstock/inventaire_stock", $data);
        }
    }
    
    function exportExcel(){
        $date = date_create($this->input->post("dateInventaire"));
        
        
        $sep=";";
	$ret=$this->InventaireDao->findAllInventaire(new DateTime(date_format($date, "Y-m-d H:i:s")));
	$guill='"';

	// Instruction 1
	$fp = fopen ("inventaire_stock.csv", "w+");
	// Instruction 2
	fseek ($fp, 0);
	// Instruction 3
	fputs ($fp,"Reference $sep Materiel $sep Quantite en Stock $sep Unite");
	fputs ($fp,"\r\n");
	fputs ($fp,"\r\n");

	foreach($ret as $row){
		fputs ($fp,$guill);
			fputs ($fp,$row->getReference());
		fputs ($fp,$guill);

			fputs ($fp,$sep);

		fputs ($fp,$guill);
			fputs ($fp,$row->getMateriel());
		fputs ($fp,$guill);

			fputs ($fp,$sep);

		fputs ($fp,$guill);
			fputs ($fp,$row->getQuantiteStock());
		fputs ($fp,$guill);

			fputs ($fp,$sep);

		fputs ($fp,$guill);
			fputs ($fp,$row->getUnite());
		fputs ($fp,$guill);

			fputs ($fp,$sep);
		fputs ($fp,"\r\n");
	}

	fputs ($fp,"\r\n");
	fputs ($fp,"\r\n");
	// Instruction 4
	fclose ($fp);
	// Instruction 5
	header("location:".base_url()."/inventaire_stock.csv");
    }
}
