<?php

namespace models;

use core\Database;
use core\FlashMessage;

class Karyawan
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

	public function getAllKaryawan()
	{
		$this->db->prepare("SELECT * FROM karyawan k JOIN [user] u ON k.user_id = u.id_user");
		return $this->db->resultSet();
	}
}