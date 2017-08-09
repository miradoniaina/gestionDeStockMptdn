<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of RetourMaterielController
 *
 * @author MIRADO
 */
class ListeTransfertController extends MY_Controller {
    //put your code here
    
    function __construct() {
        parent::__construct();
        $this->load->model('dao/DetailTransfertViewDao');
        $this->load->model('dao/DetailTransfertDao');
        $this->load->model('dao/TransfertDao');
    }
    
    function index(){
        $data = array(
          'transferts' => $this->DetailTransfertViewDao->findTransfertsAll() ,
          'mes_transfert' => $this->TransfertDao->findByIdPersonnel($this->session->userdata("id_personnel")), 
          'exception' => ''  
        );
        
        $this->load->view("flux_materiels/retour_materiel/liste_transfert", $data);
    }
    
    function fiche($i){
        var_dump($i);
    }
    
    function transfertDetails($idTransfert){
        $data = array(
            'transfert' => $this->TransfertDao->findById("transfert", $idTransfert),
            'transferts' => $this->DetailTransfertDao->findAllByIdTransfert($idTransfert),
            'exception' => ''
        );
        
        var_dump($data);
        
        $this->load->view("flux_materiels/retour_materiel/detailTransfert" , $data);
    }
}
