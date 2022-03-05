<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produit extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/userguide3/general/urls.html
     */
    public function index()
    {
        $this->load->view('login/login_view');
    }

    public function signin()
    {
        $role = $this->input->post("role");
        switch ($role) {
            case 'departement':
                $data = array(
                    'page' => 'departement/accueil_view.php',
                    'title' => 'Tableau de bord'
                );
                $this->load->view('template', $data);

            case 'admin':
                $data = array(
                    'page' => 'accueil/accueil_view.php',
                    'title' => 'Tableau de bord'
                );
                $this->load->view('template_admin', $data);
        }
    }
}
