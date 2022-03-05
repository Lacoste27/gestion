<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stock extends CI_Controller {

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
	public function index(){
        $data = array (
            'page' => 'stock/stock_view.php',
            'title' => 'Stock'
        );
		$this->load->view('template_admin', $data);
	}

    public function mouvement(){
        $data = array (
            'page' => 'stock/mouvement_stock_view.php',
            'title' => 'Mouvement de stock'
        );
		$this->load->view('template_admin', $data);
	}

}