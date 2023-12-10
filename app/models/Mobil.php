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

	public function getMobil($id) {
		$this->db->prepare("SELECT id_mobil AS id, md.model AS model, YEAR(tahun) AS tahun, nopol, warna, 
       	harga_sewa AS harga, mk.merek AS merek FROM mobil m 
    	LEFT OUTER JOIN model md ON m.model_id = md.id_model 
    	LEFT OUTER JOIN merek mk ON md.merek_id = mk.id_merek WHERE m.id_mobil =:id");
		$this->db->bind(":id", $id);
		return $this->db->resultSet();
	}
}