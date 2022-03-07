<?php
defined('BASEPATH') OR exit('No direct script access allowed');//miaro mba tsy hisy hi acceder directement

class Devis extends CI_Controller {

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
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	function __construct() {
        parent::__construct();
        $this->load->library('session');
        //session_start();
    }
	public function index()
	{
		$this->load->model('Model_Devis');

		$data['fournisseur'] = $this->Model_Devis->findFournisseur();
		$data['produit'] = $this->Model_Devis->findBesoinGroupe();
		//var_dump($data['produit']);
		$_SESSION['temp'] = array();
		$data['title'] = "Insert devis details" ;
		$data['page'] = "devis/devis_insert_view.php";

		$this->load->view('template',$data);
	}		

	public function insertDevisDetails(){
		
		$this->load->model('Model_Devis');

		$idproduit = $this->input->get('idproduit');
		$quantite = $this->input->get('entre');
		$idproduit=explode('&',$idproduit);
		$temp['idProduit']=$idproduit[0];
		$temp['nom']=$idproduit[1];
		$temp['quantite']=$quantite;

		
		$_SESSION['temp'][]=$temp;
		

		$data['fournisseur'] = $this->Model_Devis->findFournisseur();
		$data['produit'] = $this->Model_Devis->findBesoinGroupe();
		$data['title'] = "Insert devis details" ;
		$data['page'] = "devis/devis_insert_view.php";

		$this->load->view('template',$data);
	}

	public function insertDevis(){
		
		$this->load->model('Model_Devis');
		$idFournisseur = $this->input->get('idproduit');
		$date = $this->input->get('entre');

		$this->Model_Devis->insertDevis($idFournisseur,$date);
		$idDevis = $this->Model_Devis->findMaxId();
		var_dump($idDevis);

		for($i=0;$i<count($_SESSION['temp']);$i++){
			$this->Model_Devis->insertDetailsDevis($idDevis,$_SESSION['temp'][$i]['idProduit'],$_SESSION['temp'][$i]['quantite']);
		}

		$_SESSION['temp']=array();
		$data['fournisseur'] = $this->Model_Devis->findFournisseur();
		$data['produit'] = $this->Model_Devis->findBesoinGroupe();
		$data['page'] = "devis/devis_insert_view.php";
		$data['title'] = "Insert devis details" ;
		$this->load->view('template',$data);
	}

	public function listeDevis(){
		$this->load->model('Model_Devis');
		$data['devis'] = $this->Model_Devis->findDevis();
		$data['title'] = "Insert devis details" ;
		$data['page'] = "devis/devis_liste_view.php";
		$this->load->view('template',$data);
	}

	public function detailsDevis(){
		
		$this->load->model('Model_Devis');
		
		
		$idDevis = $this->input->get('detail');
		$data['devis'] = $this->Model_Devis->findDevis();
		$data['entre'] = $this->Model_Devis->findDevisById($idDevis);
		$data['devisRay'] = $this->Model_Devis->findDevisRayById($idDevis);
		$data['title'] = "Insert devis details" ;
		$data['page'] = "devis/devis_liste_view.php";
		$this->load->view('template',$data);
	}
}
