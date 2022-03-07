<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dispatch extends CI_Controller
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
    public function __construct() {
		parent::__construct();
		$this->load->model('Model_Dispatch');
	}

    public function index(){
        $besoinlist = $this->Model_Stock->GetAllBesoin(1);
        $data = array (
            'page' => 'besoin/liste_departement_view.php',
            'title' => 'Liste des besoins'  
        );
		$this->load->view('template_admin', $data);
	}

    public function insert(){
        $data = array (
            'id' => 'besoin/dispatch_besoin_view.php',
            'idBesoin' => 'Dispatch',
            'DateReception' => 'date',
            'quantite' => '2'
        );
        $this->Model_Stock->InsertDispatch($data);
		$this->load->view('template_admin', $data);
	}

}
