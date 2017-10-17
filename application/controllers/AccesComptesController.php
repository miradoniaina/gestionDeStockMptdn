<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AccesComptesController extends MY_Controller {

    /**
     * Index Page for this controller.
     * f
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    
    public function __construct() {
        parent::__construct();
        $this->load->model('services/AccesComptesServices');
    }
    
    public function index() {
        
        $data = array(
          'services' => $this->BaseService->findAll('services')  
        );
        
        var_dump($data);
        $this->load->view('login/login', $data);
        
        
    }

    public function login() {
        $this->load->helper('array');
        $this->load->library('form_validation');
        $this->load->model('services/AccesComptesServices');
//      $this->load->model('AgentDao');

        $login = $this->input->post('email');
        $password = $this->input->post('mdp');

        $log = $this->AccesComptesServices->login($login, $password);

        if ($log != null) {
            $data = array(
                'id_personnel' => $log->id_personnel,
                'nom' => $log->nom,
                'prenom' => $log->prenom,
                'poste' => $log->poste,
                'profil' => $log->profil,
                'role' => $log->id_role_personnel,
                'sousEntree' => serialize([]),
                'sousSortie' => serialize([]),
                'sousTransferts' => serialize([]),
                'sousRetours' => serialize([]),
                'logged_in' => TRUE
            );
            $this->session->set_userdata($data);
            redirect("index.php/entreeStockController");
        } else {
            redirect("index.php/accesComptesController/index");
        }
    }

    public function loginWb() {
        $this->load->helper('array');
        

        $login = $this->input->post('email');
        $password = $this->input->post('mdp');

        
        header('Access-Control-Allow-Origin: *');

        try {
            $log = $this->AccesComptesServices->login($login, $password);
            
            if ($log != null) {
                $data = array(
                    'id_personnel' => $log->id_personnel
                );
                echo json_encode($data);
            } else {
                throw new Exception("email et mot de passe non valide...");
            }
        } catch (Exception $ex) {

            $data = array(
                'exception' => $ex->getMessage()
            );

            echo json_encode($data);
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect("index.php/accesComptesController/index");
    }
    
    function inscription(){
        try{
            $this->db->trans_start(FALSE);
            $profil = "image";
            $upload_data = $this->BaseService->my_do_upload($profil, '/assets/images/profil_personnel');
            
            $this->AccesComptesServices->inscription($this->input->post('email'), $this->input->post('nom'), $this->input->post('prenom'), $this->input->post('matricule'), $this->input->post('idService'), $this->input->post('porte'), $this->input->post('telephone'), $upload_data['file_name'], $this->input->post('mdp'), $this->input->post('poste'));
            $this->db->trans_complete();
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

}
