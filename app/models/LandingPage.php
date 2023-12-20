<?php

namespace models;

use core\Database;

class LandingPage
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

	public function getMobil() {
		$this->db->prepare("SELECT id_mobil AS id, md.model AS model, YEAR(tahun) AS tahun, nopol, warna, 
       	harga_sewa AS harga, mk.merek AS merek, img FROM mobil m 
    	LEFT OUTER JOIN model md ON m.model_id = md.id_model 
    	LEFT OUTER JOIN merek mk ON md.merek_id = mk.id_merek");
		return $this->db->resultSet();
	}
}