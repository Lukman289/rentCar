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

	public function getPelanggan($username)
	{
		$this->db->prepare("SELECT * FROM pelanggan p JOIN [user] u ON p.user_id = u.id_user WHERE username=:username");
		$this->db->bind(":username", $username);
		return $this->db->single();
	}

	public function addPemesanan($data = [])
	{
		$this->db->prepare("INSERT INTO pemesanan VALUES (:pelanggan_id, :mobil_id, :tgl_pemesanan, :tgl_pengembalian, :jumlah_pembayaran)");
		$pelanggan_id = $data['pelanggan_id'];
		$mobil_id = $data['mobil_id'];
		$tgl_pemesanan = $data['tgl_pemesanan'];
		$tgl_pengembalian = $data['tgl_pengembalian'];
		$jumlah_pembayaran = $data['jumlah_pembayaran'];

		$this->db->bind(":pelanggan_id", $pelanggan_id);
		$this->db->bind(":mobil_id", $mobil_id);
		$this->db->bind(":tgl_pemesanan", $tgl_pemesanan);
		$this->db->bind(":tgl_pengembalian", $tgl_pengembalian);
		$this->db->bind(":jumlah_pembayaran", $jumlah_pembayaran);

		return $this->db->execute();

	}
}