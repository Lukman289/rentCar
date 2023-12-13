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
			$this->fm->message("danger", "in edit data dosen");
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

		/*replace quoted string("''") to regular string(""), because we're using that value to bind function*/
		$model_id = str_replace("'", "", $model_id);
		$tahun = str_replace("'", "", $tahun);
		$nopol = str_replace("'", "", $nopol);
		$warna = str_replace("'", "", $warna);
		$harga_sewa = str_replace("'", "", $harga_sewa);
		$status = str_replace("'", "", $status);

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
			$this->fm->message("danger", "in adding data dosen");
			$message =  $this->fm->getFlashData("danger");
		}
		return $message;
	}

	public function deleteMobil($id_mobil)
	{
		$this->db->prepare("DELETE FROM mobil WHERE id_mobil=:id_mobil");
		$this->db->bind(":id_mobil", $id_mobil);
		return $this->db->execute();
	}

	public function edit($tableName, $editData, $fkData = [])
	{
		$isUpdateFkSuccess = null;
		$isUpdateSuccess = null;
		if (isset($fkData)) {
			/*to avoid update fk when fk data from form is empty*/
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
				$isUpdateFkSuccess =  $this->db->updates("$column", $value, $conditionEdit);
			}
		}

		if ($isUpdateFkSuccess) {
			$conditionEdit = "nama = '" . $editData['condition'] . "'";
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
			foreach ($fkData as $elm => $value) {
				$isInsertFkSuccess =  $this->db->inserts($elm, $value);
			}
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
}