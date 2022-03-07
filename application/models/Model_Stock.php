<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Stock extends CI_Model {
	
	public function produits(){
		$sql = "select * from produit ";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function mouvementStock(){
		$sql = "select s.*,m.*,p.nom from stock s inner join mouvementStock m  on s.id=m.idStock inner join Produit p on s.idProduit=p.id;";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function mouvementStockparProduit($idProduit){
		$sql = "select s.*,m.*,p.nom from stock s inner join mouvementStock m  on s.id=m.idStock inner join Produit p on s.idProduit=p.id where p.id=%s";
			$sql = sprintf($sql,$idProduit);
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function stockDispo($idProduit){
		$sql = "select * from stock where quantiteActuel!=0 and idProduit=%s";
		$sql = sprintf($sql,$idProduit);
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	
	public function saveStock($idProduit,$quantiteInitial,$prixAchat,$dateStock){
		$quantiteActuel=$quantiteInitial;
		$sql = "insert into stock (idProduit,quantiteInitial,prixAchat,quantiteActuel,DateStock) values (%s,%s,%s,%s,'%s')";	
		$sql = sprintf($sql,$idProduit,$quantiteInitial,$prixAchat,$quantiteActuel,$dateStock);
		$query = $this->db->query($sql);
	}


	public function saveMvtStock($dateMOuvementStock,$idStock,$quantiteUtilise,$quantiteAjouter,$quantiteReste){
		$sql = "insert into  mouvementStock (dateMOuvementStock,idStock,quantiteUtilise,quantiteAjouter,quantiteReste) values ('%s',%s,%s,%s,%s)";	
		$sql = sprintf($sql,$dateMOuvementStock,$idStock,$quantiteUtilise,$quantiteAjouter,$quantiteReste);
		$query = $this->db->query($sql);
	}

 	public function findIndex(){
		$sql = "select max(id) as id from stock ";
		$query = $this->db->query($sql);
		$idStock=$query->result_array();
		return $idStock[0]['id'];;
		
	}

	public function sommeProduits(){
		$sql = "select sum(QuantiteInitial) somme from stock ";
		$query = $this->db->query($sql);
		$idStock=$query->result_array();
		return $idStock[0]['somme'];;
	}

	public function stockageParProduit(){
		$sql = "select sum(s.QuantiteInitial) quantiteProduit ,p.nom from stock s inner join produit p on s.idProduit=p.id group by p.id";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function sommePrixProduitsDispo(){
		$sql = "select sum(prixAchat*quantiteActuel)  sommePrix from Stock";
		$query = $this->db->query($sql);
		$idStock=$query->result_array();
		return $idStock[0]['sommePrix'];;
		
	}


	public function quantiteStock($idProduit){
		$sql = "select sum(quantiteActuel) as somme from stock where idProduit=%s";
		$sql = sprintf($sql,$idProduit);
		$query = $this->db->query($sql);
		$idStock=$query->result_array();
		return $idStock[0]['somme'];;
		
	}

	public function quantiteLany($idProduit){
		$sql = "select sum(  quantiteInitial-quantiteActuel) quantiteLany  from stock where idProduit  =%s";
		$sql = sprintf($sql,$idProduit);
		$query = $this->db->query($sql);
		$idStock=$query->result_array();
		return $idStock[0]['quantiteLany'];;
		
	}


	
	public function sommeProduitInitial($idProduit){
		$sql = "select sum(QuantiteInitial) sommeProduitInitial from stock where idProduit  =%s";
			$sql = sprintf($sql,$idProduit);
		$query = $this->db->query($sql);
		$idStock=$query->result_array();
		return $idStock[0]['sommeProduitInitial'];;
		
	}
	


	 public function update ($quantiteActuel,$id){
		$sql = "update stock set quantiteActuel = %s where id=%d ";	
		$sql = sprintf($sql, $quantiteActuel,$id);
		$query = $this->db->query($sql);	
	}




	

}

    