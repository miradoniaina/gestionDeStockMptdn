<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TransfertExtenreDao
 *
 * @author MIRADO
 */
class TransfertExtenreDao extends BaseService  {
    //put your code here
    function __construct() {
        parent::__construct();
        $this->load->model("modele/TransfertModele");
    }
    
    
    
}
