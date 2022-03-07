<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LivraisonModel extends CI_Model {
	
	
	
	public function saveLivraison($idProduit,$quantiteInitial,$prixAchat,$dateStock){
		$quantiteActuel=$quantiteInitial;
		$sql = "insert into livraison (idProduit,quantiteInitial,prixAchat,quantiteActuel,DateStock) values (%s,%s,%s,%s,'%s')";	
		$sql = sprintf($sql,$idProduit,$quantiteInitial,$prixAchat,$quantiteActuel,$dateStock);
		$query = $this->db->query($sql);
	}




}

    