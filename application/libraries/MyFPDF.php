<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PDF
 *
 * @author MIRADO
 */
defined('BASEPATH') OR exit('No direct script access allowed');
require('fpdf181/fpdf.php');

class MyFPDF extends FPDF {
    private $titre;
    
    function __construct() {
        parent::__construct();
        $CI = & get_instance();
    }
    
    function getTitre() {
        return $this->titre;
    }

    function setTitre($titre) {
        $this->titre = $titre;
    }


}
