<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Commande extends CI_Controller
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
        $data = array(
            'page' => 'commande/list_commande_view.php',
            'title' => 'Liste des commande envoye'
        );
        $this->load->view('template_admin', $data);
    }

    public function insert()
    {
        $data = array(
            'page' => 'commande/insert_commande_view.php',
            'title' => 'Envoye de commande'
        );
        $this->load->view('template_admin', $data);
    }

}
