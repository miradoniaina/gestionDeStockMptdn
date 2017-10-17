<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Description of PdfController
 *
 * @author MIRADO
 */
class PdfController extends MY_Controller {

    //put your code here
    function __construct() {
        parent::__construct();
        parent::checkLogIn();
        $this->load->library('MyFPDF');
//        $this->Pdf->fontpath = 'font/'; // Specify font folder
    }

    function index() {
        // Instanciation de la classe dérivée
        $data = array(
          'text' => "bonjour éééé"  
        );
        
        $this->load->view('pdfs_export/bon_de_sortie_pdf', $data);
        
//        $pdf->Output();
    }

}
