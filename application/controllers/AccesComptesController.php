<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AccesComptesController extends CI_Controller {

    /**
     * Index Page for this controller.
     *f
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
    public function index() {
        $this->load->view('login/login');
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
                'detenteur' => $log->detenteur,
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

    public function logout() {
        $this->session->sess_destroy();
        redirect("index.php/accesComptesController/index");
    }

}
