<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Reception extends CI_Controller
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
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_Reception');
        $this->load->model('Model_Stock');
    }

    public function index()
    {
        $livraisonlist = $this->Model_Reception->GetAllLivraison();
        $data = array(
            'page' => 'reception/commande_livre_view.php',
            'title' => 'Liste des commandes livré',
            'livraisonlist' =>  $livraisonlist
        );
        $this->load->view('template_admin', $data);
    }

    public function details($livraison_id)
    {
        $livraison =  $this->Model_Reception->GetLivraisonById($livraison_id);
        $detailsLivraison = $this->Model_Reception->GetDetailsLivraison($livraison_id);
        $data = array(
            'page' => 'reception/details_livre_view.php',
            'title' => 'Details du livraison : ',
            'livraison' => $livraison,
            'detailsLivraison' => $detailsLivraison
        );
        $this->load->view('template_admin', $data);
    }

    public function insert()
    {
        $livraison_id = $this->input->post("livraison_id");
        $detailsLivraison = $this->Model_Reception->GetDetailsLivraison($livraison_id);
        $commandedetails_id = $this->input->post("detailscommande_id");
        $detailscommande = $this->Model_Reception->GetDetailsCommande($commandedetails_id);

        $data = array(
            'id' => null,
            'reference' => 'references',
            'idLivraison' => $livraison_id,
            'dateReception' => '2022-03-01'
        );

        $this->Model_Reception->InsertReception($data);

        $reception_id = $this->Model_Reception->MaxReceptionId();

        foreach ($detailsLivraison as $livraison) {
            $details = array(
                'id'  => null,
                'idDetailsCommande'  =>  $commandedetails_id,
                'idReception'  =>  $reception_id[0]["max"],
                'observations'  =>  'observations',
                'qualite' => 1,
                'quantiteRecus' => $livraison["quantite"]
            );

            $this->Model_Reception->InsertReceptionDetails($details);
        }

        $reception_details = $this->Model_Reception->GetReceptionDetails($reception_id[0]["max"]);
        
        foreach ($reception_details as $details) {
            $this->StockModel->saveStock($details["idProduit"],  $details["quantiteRecus"], $details["prixUnitaire"], '2020-02-02');
        }

        $livraisonlist = $this->Model_Reception->GetAllLivraison();

        $data = array(
            'page' => 'reception/commande_livre_view.php',
            'title' => 'Details du livraison : ',
            'livraisonlist' => $livraisonlist,
        );
        $this->load->view('template_admin', $data);
    }
}
