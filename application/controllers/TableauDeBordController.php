<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TableauDeBordController
 *
 * @author MIRADO
 */
class TableauDeBordController extends MY_Controller{
    //put your code here
    function __construct() {
        parent::__construct();
        $this->load->model('services/etatStockGraphSplineService');
    }
    
    function index(){
        $data = array(
          'totalMateriels' => $this->BaseService->count("materiel"),
          'totalMvtStocks' => $this->BaseService->count("mvt_stock"),
          'totalTransferts' => $this->BaseService->count("transfert"),
          'totalRetourMateriels' => $this->BaseService->count("retour_materiel"),
//          'graph' => $this->etatStockGraphSplineService->etat(2017),
          'exception' => ''  
        );
        
//        var_dump($data);
        
        $this->load->view('tableau_de_bord/index',$data);
    }
    
    
}
