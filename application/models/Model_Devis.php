<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Devis extends CI_Model {
	
    public function findFournisseur(){
		$sql = "select * from fournisseur";
		$query = $this->db->query($sql);
		$data = array(); 
		foreach ($query->result_array() as $row) {$data[] = $row ; }
		return $data ;
	} 

	public function findProduit(){
		$sql = "select * from produit";
		$query = $this->db->query($sql);
		$data = array(); 
		foreach ($query->result_array() as $row) {$data[] = $row ; }
		return $data ;
	}

	public function findBesoinGroupe(){
		$sql = "select sum(d.quantite) as quantite, d.idProduit,p.nom from besoin d inner join produit p on d.idProduit=p.id group by d.idProduit;";
		$query = $this->db->query($sql);
		//echo $sql;
		$data = array(); 
		foreach ($query->result_array() as $row) {$data[] = $row ; }
		return $data ;
	}

	public function findMaxId(){
		$sql = "select max(id) as id from devis";
		$query = $this->db->query($sql);
		$data = array(); 
		foreach ($query->result_array() as $row) {$data[] = $row ; }
		// /echo ($data[0]['id']);
		return $data[0]['id'];
	} 

	public function insertDevis($idFournisseur,$datevalide){
		
		$sql1 = "insert into devis values (null,%s,now(),'%s')";	
		$sql1 = sprintf($sql1,$idFournisseur,$datevalide);
		//echo $sql1;
		//var_dump($sql);
		$query1 = $this->db->query($sql1);
		
	}

	public function insertDetailsDevis($idDevis,$idProduit,$Quantite){
		
		$sql1 = "insert into detailsdevis values (null,%s,%s,%s)";	
		$sql1 = sprintf($sql1,$idDevis,$idProduit,$Quantite);
		//echo $sql1;
		//var_dump($sql);
		$query1 = $this->db->query($sql1);
		
	}

	public function findDevis(){
		$sql = " select d.id,d.dateDevis,d.dateValidite,f.nom from devis d inner join fournisseur f on d.idFournisseur=f.id";
		$query = $this->db->query($sql);
		$data = array(); 
		foreach ($query->result_array() as $row) {$data[] = $row ; }
		return $data ;
	}

	public function findDevisById($id){
		$sql = "select d.id,d.idDevis,d.idProduit,p.nom,d.quantite from detailsdevis d inner join produit p on d.idProduit=p.id where d.idDevis=%s";
		$sql = sprintf($sql,$id);
		echo $sql;
		$query = $this->db->query($sql);
		$data = array(); 
		foreach ($query->result_array() as $row) {$data[] = $row ; }
		return $data ;
	}

	
	public function findDevisRayById($id){
		$sql = "select d.id,d.dateDevis,d.dateValidite,f.nom from devis d inner join fournisseur f on d.idFournisseur=f.id where d.id=%s";
		$sql = sprintf($sql,$id);
		//echo $sql;
		$query = $this->db->query($sql);
		$data = array(); 
		foreach ($query->result_array() as $row) {$data[] = $row ; }
		return $data[0] ;
	}
}

    