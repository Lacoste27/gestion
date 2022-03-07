<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Stock extends CI_Controller
{


	function __construct()
	{
		parent::__construct();
		$this->load->model('Model_Stock');
	}

	public function index()
	{

		$data['produits'] = $this->Model_Stock->produits();
		$data['mouvement'] = $this->Model_Stock->mouvementStock();
		$data['sommeProduits'] = $this->Model_Stock->sommeProduits();
		$data['stockageParProduit'] = $this->Model_Stock->stockageParProduit();
		$data['title'] = "Stock  view";
		$data['page'] = "stock/stock_view.php";
		$this->load->view('template_admin', $data);
	}

	public function mouvementStockparProduit()
	{
		$idProduit = $this->input->post('idProduit');
		$data['mouvement'] = $this->Model_Stock->mouvementStockparProduit($idProduit);
		$data['quantiteStock'] = $this->Model_Stock->quantiteStock($idProduit);
		$data['quantiteLany'] = $this->Model_Stock->quantiteLany($idProduit);
		$data['sommeProduitInitial'] = $this->Model_Stock->sommeProduitInitial($idProduit);
		$data['title'] = "Stock  view";
		$data['page'] = "stock/mouvementProduit_vieww.php";
		$this->load->view('template_admin', $data);
	}


	public function indexMouvement()
	{

		$data['produits'] = $this->Model_Stock->produits();
		$data['mouvement'] = $this->Model_Stock->mouvementStock();
		$data['sommeProduits'] = $this->Model_Stock->sommeProduits();
		$data['stockageParProduit'] = $this->Model_Stock->stockageParProduit();
		$data['title'] = "Stock  view";
		$data['page'] = "stock/mouvement_stock_view.php";
		$this->load->view('template_admin', $data);
	}

	public function mouvement()
	{
		$idProduit = $this->input->post('idProduit');
		$dateStock = $this->input->post('dateStock');
		$quantiteTotal = $this->input->post('quantiteTotal');
		$Stock = $this->Model_Stock->quantiteStock($idProduit);
		if ($quantiteTotal > $Stock) {
			$data['nostock'] = true;
			$data['produits'] = $this->Model_Stock->produits();
			$data['disponible'] = $Stock;
			$data['mouvement'] = $this->Model_Stock->mouvementStock();
			$data['sommeProduits'] = $this->Model_Stock->sommeProduits();
			$data['stockageParProduit'] = $this->Model_Stock->stockageParProduit();
			$data['title'] = "Stock  view";
			$data['page'] = "stock/stock_view.php";
			$this->load->view('template_admin', $data);
		}
		if ($quantiteTotal <= $Stock) {
			$data['nostock'] = false;	
			$stockdispo = $this->Model_Stock->stockDispo($idProduit);
			for ($i = 0; $i < count($stockdispo); $i++) {

				$ambiny = $stockdispo[$i]['quantiteActuel'] - $quantiteTotal;
				if ($ambiny >= 0) {
					$reste = $ambiny;
					$quantiteAjoute = 0;
					$idStock = $stockdispo[$i]['id'];
					$this->Model_Stock->saveMvtStock($dateStock, $idStock, $quantiteTotal, $quantiteAjoute, $reste);
					$this->Model_Stock->update($reste, $idStock);
					break;
				}
				if ($ambiny < 0) {
					$reste = 0;
					$quantiteAjoute = 0;
					$quantiteTotal = -$ambiny;
					$quantiteUtilise = $stockdispo[$i]['quantiteActuel'];
					$idStock = $stockdispo[$i]['id'];
					$this->Model_Stock->saveMvtStock($dateStock, $idStock, $quantiteUtilise, $quantiteAjoute, $reste);
					$this->Model_Stock->update($reste, $idStock);
				}
			}
			$data['produits'] = $this->Model_Stock->produits();
			$data['mouvement'] = $this->Model_Stock->mouvementStock();
			$data['sommeProduits'] = $this->Model_Stock->sommeProduits();
			$data['stockageParProduit'] = $this->Model_Stock->stockageParProduit();
			$data['title'] = "Stock  view";
			$data['page'] = "stock/stock_view.php";
			$this->load->view('template_admin', $data);
			/////$this->load->view('stock/stock_view', $data);
		}
	}

	public function saveStock($idProduit, $dateStock, $prixAchat, $quantiteTotal )
	{

		$this->Model_Stock->saveStock($idProduit, $quantiteTotal, $prixAchat, $dateStock);
		$idStock = $this->Model_Stock->findIndex();

		$quantiteUtilise = 0;
		$this->Model_Stock->saveMvtStock($dateStock, $idStock, $quantiteUtilise, $quantiteTotal, $quantiteTotal);
		$data['produits'] = $this->Model_Stock->produits();
		$data['mouvement'] = $this->Model_Stock->mouvementStock();
		$data['sommeProduits'] = $this->Model_Stock->sommeProduits();
		$data['stockageParProduit'] = $this->Model_Stock->stockageParProduit();
		$data['title'] = "Stock view";
		$data['page'] = "stock/stock_view.php";
		$this->load->view('template_admin', $data);
	}
}
