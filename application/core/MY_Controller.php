<?php
//defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of BaseController
 *
 * @author MIRADO
 */
class MY_Controller extends CI_Controller{
    //put your code here
    function __construct() {
        parent::__construct();
        
//        if(! $this->isAuthorized()) return redirect ('welcome');
    }
    
    function test(){
        redirect('welcome');
    }
    
    public function do_upload($userfile) {
        $config['upload_path'] = './assets/images/materiels';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 2048;
        $config['max_width'] = 0;
        $config['max_height'] = 0;

        $this->load->library('upload', $config);
        
        if (!$this->upload->do_upload($userfile)) {
//            return $this->upload->display_errors();
              return false;
        } else {
            return $this->upload->data();
        }
    }
    
    function checkLogIn(){
        if(empty($this->session->userdata("nom"))){
            redirect("index.php");
        }
    }
}
