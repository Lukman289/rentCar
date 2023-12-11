<?php

namespace models;

use core\Database;

class Mobil
{
	private Database $db;

	public function __destruct()
	{
		unset($this->db);
	}
	public function __construct()
	{
		$this->db = new Database();
	}

	public function getAllMobil() {
		$this->db->prepare("SELECT id_mobil , md.model AS model, YEAR(tahun) AS tahun, nopol, warna, 
       	harga_sewa AS harga, mk.merek AS merek FROM mobil m 
    	LEFT OUTER JOIN model md ON m.model_id = md.id_model 
    	LEFT OUTER JOIN merek mk ON md.merek_id = mk.id_merek");
		return $this->db->resultSet();
	}

	public function getMobil($id) {
		$this->db->prepare("SELECT id_mobil , md.model AS model, YEAR(tahun) AS tahun, nopol, warna, 
       	harga_sewa AS harga, mk.merek AS merek FROM mobil m 
    	LEFT OUTER JOIN model md ON m.model_id = md.id_model 
    	LEFT OUTER JOIN merek mk ON md.merek_id = mk.id_merek WHERE m.id_mobil =:id");
		$this->db->bind(":id", $id);
		return $this->db->resultSet();
	}

	public function getModel() {
		$this->db->prepare("SELECT id_model, model, merek, nama FROM model md JOIN merek mk ON md.merek_id = mk.id_merek
		JOIN kategori k ON k.id_kategori = md.kategori_id");
		return $this->db->resultSet();
	}

	public function delete($id_mobil) {
		$this->db->prepare("DELETE FROM mobil WHERE id_mobil=:id_mobil");
		$this->db->bind(":id_mobil", $id_mobil);
		return $this->db->execute();
	}
}