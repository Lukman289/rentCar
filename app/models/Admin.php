<?php

namespace models;

use core\Database;
use core\FlashMessage;

class Admin
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

	public function editMobil($editData = [])
	{
		$this->db->prepare("UPDATE mobil SET nopol =:nopol, warna = :warna, harga_sewa =:harga_sewa, status =:status WHERE id_mobil =:id_mobil");

		$nopol = $this->db->antiDbInjection($editData["nopol"]);
		$warna = $this->db->antiDbInjection($editData["warna"]);
		$harga_sewa = $this->db->antiDbInjection($editData["harga"]);
		$status = $this->db->antiDbInjection($editData["status"]);
		$id_mobil = $this->db->antiDbInjection($editData["id_mobil"]);

		$nopol = str_replace("'", "", $nopol);
		$warna = str_replace("'", "", $warna);
		$harga_sewa = str_replace("'", "", $harga_sewa);
		$status = str_replace("'", "", $status);
		$id_mobil = str_replace("'", "", $id_mobil);

		$this->db->bind(':nopol', $nopol);
		$this->db->bind(':warna', $warna);
		$this->db->bind(':harga_sewa', $harga_sewa);
		$this->db->bind(':status', $status);
		$this->db->bind(':id_mobil', $id_mobil);

		$isUpdateSuccess = $this->db->execute();
		$message = null;
		if ($isUpdateSuccess) {
			$this->fm->message("success", "edit data mobil");
			$message = $this->fm->getFlashData("success");
		} else {
			$this->fm->message("danger", "in edit data mobil");
			$message =  $this->fm->getFlashData("danger");
		}
		return $message;

	}

	public function addMobil($addData = [])
	{
		/*insert into mobil table*/
		$this->db->prepare("INSERT INTO mobil(model_id, tahun, nopol, warna, harga_sewa, status) VALUES (:model_id, :tahun, :nopol, :warna, :harga_sewa, :status)");

		$model_id = $this->db->antiDbInjection($addData["id_model"]);
		$tahun = $this->db->antiDbInjection($addData["tahun"]);
		$nopol = $this->db->antiDbInjection($addData["nopol"]);
		$warna = $this->db->antiDbInjection($addData["warna"]);
		$harga_sewa = $this->db->antiDbInjection($addData["harga_sewa"]);
		$status = $this->db->antiDbInjection($addData["status"]);

		/*to bind param, so param not directly used in query and bound in separated way*/
		$this->db->bind(':model_id', $model_id);
		$this->db->bind(':tahun', $tahun);
		$this->db->bind(':nopol', $nopol);
		$this->db->bind(':warna', $warna);
		$this->db->bind(':harga_sewa', $harga_sewa);
		$this->db->bind(':status', $status);

		$isInsertSuccess = $this->db->execute();
		$message = null;
		if ($isInsertSuccess) {
			$this->fm->message("success", "adding data mobil");
			$message = $this->fm->getFlashData("success");
		} else {
			$this->fm->message("danger", "in adding data mobil");
			$message =  $this->fm->getFlashData("danger");
		}
		return $message;
	}

	public function deleteMobil($id_mobil)
	{
		$this->db->prepare("DELETE FROM mobil WHERE id_mobil=:id_mobil");
		$this->db->bind(":id_mobil", $id_mobil);
		$isInsertSuccess = $this->db->execute();
		$message = null;
		if ($isInsertSuccess) {
			$this->fm->message("success", "delete data mobil");
			$message = $this->fm->getFlashData("success");
		} else {
			$this->fm->message("danger", "in delete data mobil");
			$message =  $this->fm->getFlashData("danger");
		}
		return $message;
	}

	public function addUser($data = [])
	{
		$this->db->prepare("INSERT INTO [user] (username, password, level) VALUES (:username, HASHBYTES('sha2_256', :password), :level)");

		$username = $this->db->antiDbInjection($data['username']);
		$password = $this->db->antiDbInjection($data['password']);
		$level = $this->db->antiDbInjection($data['level']);

		$password = password_hash($password, PASSWORD_BCRYPT);

		$username = str_replace("'", "", $username);
		$password = str_replace("'", "", $password);
		$level = str_replace("'", "", $level);

		$this->db->bind(":username", $username);
		$this->db->bind(":password", $password);
		$this->db->bind(":level", $level);

		$this->db->execute();
	}

	public function edit($tableName, $editData, $fkData = [])
	{
		$isUpdateFkSuccess = null;
		$isUpdateSuccess = null;
		if (isset($fkData)) {
			foreach ($fkData as $column => $value) {
				$conditionEdit = "";
				foreach ($value as $col => $val) {
					if ($val === "") {
						unset($value[$col]);
					}
					if ($col == "conditionEdit") {
						$conditionEdit = $val;
						unset($value['conditionEdit']);
					}
				}
				$isUpdateFkSuccess =  $this->db->updates("[$column]", $value, $conditionEdit);
			}
		}

		if ($isUpdateFkSuccess) {
			$conditionEdit = "user_id = '" . $editData['condition'] . "'";
			unset($editData['condition']);
			$isUpdateSuccess = $this->db->updates($tableName, $editData, $conditionEdit);
		}

		$message = null;
		if ($isUpdateSuccess) {
			$this->fm->message("success", "update data $tableName");
			$message = $this->fm->getFlashData("success");
		} else {
			$this->fm->message("warning", "error occur in update data $tableName");
			$message =  $this->fm->getFlashData("warning");
		}
		return $message;
	}


	public function add($tableName, $addData = [], $fkData = [])
	{
		$isInsertFkSuccess = null;
		$isInsertSuccess = null;
		if (isset($fkData)) {
			$userData = $fkData['user'];
			$username = $this->db->antiDbInjection($userData['username']);
			$password = $this->db->antiDbInjection($userData['password']);
			$level = $this->db->antiDbInjection($userData['level']);
			$this->db->prepare("INSERT INTO [user](username, password, level) VALUES ('$username', CONVERT(varbinary(256), '$password'), '$level')");
			$isInsertFkSuccess = $this->db->execute();
		}


		if ($isInsertFkSuccess) {
			$addData['user_id'] = intval($this->db->lastInsertId());
			$isInsertSuccess = $this->db->inserts($tableName, $addData);
		}

		$message = null;
		if ($isInsertSuccess) {
			$this->fm->message("success", "adding data $tableName");
			$message = $this->fm->getFlashData("success");
		} else {
			$this->fm->message("warning", "error occur in adding data $tableName");
			$message =  $this->fm->getFlashData("warning");
		}
		return $message;
	}

	public function delete($tableName, $idName, $idData)
	{
		$idData = intval($idData);
		$this->db->prepare("DELETE FROM $tableName WHERE $idName =:$idName");
		$this->db->bind(":$idName", $idData);
		$isDeleteSuccess = $this->db->execute();

		$message = null;
		if ($isDeleteSuccess) {
			$this->fm->message("success", "delete data $tableName");
			$message = $this->fm->getFlashData("success");
		} else {
			$this->fm->message("warning", "error occur in delete data $tableName");
			$message =  $this->fm->getFlashData("warning");
		}
		return $message;
	}

	public function getAllPemesanan(): array
	{
		$this->db->prepare("SELECT pg.nama, id_pemesanan, model, tanggal_pemesanan, tanggal_pengembalian, jumlah_pembayaran FROM pemesanan p LEFT OUTER JOIN mobil m ON p.mobil_id = m.id_mobil 
    	LEFT OUTER JOIN model md ON m.model_id = md.id_model
		LEFT OUTER JOIN pelanggan pg ON p.pelanggan_id = pg.id_pelanggan");
		return $this->db->resultSet();
	}

	public function getAllKaryawan()
	{
		$this->db->prepare("SELECT * FROM karyawan k JOIN [user] u ON k.user_id = u.id_user");
		return $this->db->resultSet();
	}

	public function getAllPelanggan()
	{
		$this->db->prepare("SELECT * FROM pelanggan p JOIN [user] u ON p.user_id = u.id_user");
		return $this->db->resultSet();
	}

	public function getKaryawan($id_karyawan)
	{
		$this->db->prepare("SELECT * FROM karyawan k JOIN [user] u ON k.user_id = u.id_user WHERE id_karyawan=:id_karyawan");
		$this->db->bind(":id_karyawan", $id_karyawan);
		return $this->db->single();
	}

	public function getPelanggan($id_pelanggan)
	{
		$this->db->prepare("SELECT * FROM pelanggan p JOIN [user] u ON p.user_id = u.id_user WHERE id_pelanggan=:id_pelanggan");
		$this->db->bind(":id_pelanggan", $id_pelanggan);
		return $this->db->single();
	}
}