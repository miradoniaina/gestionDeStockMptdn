<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FournisseurController
 *
 * @author MIRADO
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class FournisseurController extends MY_Controller {
    //put your code here
    public function __construct() {
        parent::__construct();
        $this->checkLogIn();
        
    }
    
    function index(){
        $data = array(
          'fournisseurs' => $this->BaseService->findAll('fournisseur'),
          'exception' => ''  
        );
        
        $this->load->view( 'crud/fournisseur/liste_fournisseur',$data);
    }
    
    function nouveau(){
        
    }
}
