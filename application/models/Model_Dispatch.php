<?php
defined('BASEPATH') OR exit('No direct script access allowed');
    class Model_Dispatch extends CI_Model {
        function GetAllBesoin($departement_id) {
            $this->db->select("*");
            $this->db->from("besoin");
            $this->db->join("produit","produit.id = besoin.idProduit");
            $this->db->join("departement","departement.id = besoin.idDepartement");
            $result = $this->db->get();
            return $result->result();
        }

        function InsertDispatch($data) {
            $this->db->insert('dispatch', $data);
        }


        function SommeQuantiteDispatcher($besoin_id) {
            
        }

        function InsertMouvementStock($stock_id) {

        }

    }
?>