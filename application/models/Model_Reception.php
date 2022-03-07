<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Model_Reception extends CI_Model
{
    function GetAllLivraison()
    {
        $this->db->select("livraison.dateLivraison,livraison.reference, livraison.id as livraison_id ,commande.idFournisseur, commande.dateCommande,  commande.limiteLivraison,  fournisseur.nom,fournisseur.adresse, fournisseur.id as fournisseur_id");
        $this->db->from("livraison");
        $this->db->join("commande", "commande.id = livraison.idCommande");
        $this->db->join("fournisseur", "fournisseur.id = commande.idFournisseur");
        $result = $this->db->get();
        return $result->result_array();
    }

    function GetLivraisonById($id)
    {
        $this->db->select("livraison.dateLivraison,livraison.reference, livraison.id as livraison_id ,commande.idFournisseur, commande.dateCommande, commande.limiteLivraison, fournisseur.nom, fournisseur.adresse, fournisseur.id as fournisseur_id ");
        $this->db->from("livraison");
        $this->db->join("commande", "commande.id = livraison.idCommande");
        $this->db->join("fournisseur", "fournisseur.id = commande.idFournisseur");
        $this->db->where('livraison.id', $id);
        $result = $this->db->get();
        return $result->result_array();
    }

    function GetDetailsLivraison($id)
    {
        $this->db->select("*");
        $this->db->from("detailsLivraison");
        $this->db->join("detailsCommande","detailsCommande.id = detailsLivraison.idDetailsCommande");
        $this->db->join("produit","produit.id = detailsCommande.idProduit");
        $this->db->where('detailslivraison.idLivraison', $id);
        $result = $this->db->get();
        return $result->result_array();
    }

    function GetDetailsCommande($commande_id)
    {
        $this->db->select("*");
        $this->db->from("detailsCommande");
        $this->db->where('detailsCommande.id', $commande_id);
        $result = $this->db->get();
        return $result->result();
    }

    function GetReceptionDetails($reception_id)
    {
        $this->db->select("*");
        $this->db->from("detailsReception");
        $this->db->join('detailsCommande', "detailsCommande.id = detailsReception.idDetailsCommande");
        $this->db->where('detailsReception.idReception', $reception_id);
        $result = $this->db->get();
        return $result->result_array();
    }

    function InsertReception($data)
    {
        $this->db->insert("reception", $data);
    }

    function InsertReceptionDetails($data)
    {
        $this->db->insert("detailsReception", $data);
    }

    function MaxReceptionId(){
        $this->db->select_max('id', 'max');
        $result = $this->db->get("reception");
        return $result->result_array();
    }

    public function saveStock($idProduit, $quantiteInitial, $prixAchat, $dateStock){
        $quantiteActuel = $quantiteInitial;
        $sql = "insert into stock (idProduit,quantiteInitial,prixAchat,quantiteActuel,DateStock) values (%s,%s,%s,%s,'%s')";
        $sql = sprintf($sql, $idProduit, $quantiteInitial, $prixAchat, $quantiteActuel, $dateStock);
        $query = $this->db->query($sql);
    }   

    public function saveMvtStock($dateMOuvementStock, $idStock, $quantiteUtilise, $quantiteAjouter, $quantiteReste){
        $sql = "insert into  mouvementStock (dateMOuvementStock,idStock,quantiteUtilise,quantiteAjouter,quantiteReste) values ('%s',%s,%s,%s,%s)";
        $sql = sprintf($sql, $dateMOuvementStock, $idStock, $quantiteUtilise, $quantiteAjouter, $quantiteReste);
        $query = $this->db->query($sql);
    }

    public function InsertStock($idProduit, $dateStock, $prixAchat, $quantiteTotal){
        $this->stockModel->saveStock($idProduit, $quantiteTotal, $prixAchat, $dateStock);
        $idStock = $this->stockModel->findIndex();
        $quantiteUtilise = 0;
        $this->stockModel->saveMvtStock($dateStock, $idStock, $quantiteUtilise, $quantiteTotal, $quantiteTotal);
    }
}
