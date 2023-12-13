<?php

namespace models;

use core\Database;
use core\FlashMessage;

class Pelanggan
{
	private Database $db;
	private FlashMessage $fm;
	public function __construct()
	{
		$this->db = new Database();
		$this->fm = new FlashMessage();
	}

	public function __destruct()
	{
		unset($this->db);
	}

	public function getAllPelanggan()
	{
		$this->db->prepare("SELECT * FROM pelanggan p JOIN [user] u ON p.user_id = u.id_user");
		return $this->db->resultSet();
	}
}