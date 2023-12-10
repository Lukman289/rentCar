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

	public function edit($editData = [])
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

	public function add($addData = [])
	{
		/*to retrieve model_id from model to insert mobil table*/
//		$this->db->prepare("SELECT id_model FROM model WHERE model =:model");
		
		/*to escape special character*/
//		$model = $this->db->antiDbInjection($addData["model"]);

		/*replace quoted string("''") to regular string(""), because we're using that value to bind function*/
//		$model = str_replace("'", "", $model);


		/*to bind param, so param not directly used in query and bound in separated way*/
//		$this->db->bind(":model", $model);
//		$row = $this->db->single();


		/*insert into mobil table*/
		$this->db->prepare("INSERT INTO mobil(model_id, tahun, nopol, warna, harga_sewa, status, img) VALUES (:model_id, :tahun, :nopol, :warna, :harga_sewa, :status, :img)");

		$model_id = $this->db->antiDbInjection($addData["id_model"]);
		$tahun = $this->db->antiDbInjection($addData["tahun"]);
		$nopol = $this->db->antiDbInjection($addData["nopol"]);
		$warna = $this->db->antiDbInjection($addData["warna"]);
		$harga_sewa = $this->db->antiDbInjection($addData["harga_sewa"]);
		$status = $this->db->antiDbInjection($addData["status"]);
		$img = $this->db->antiDbInjection($addData["img"]);

		/*replace quoted string("''") to regular string(""), because we're using that value to bind function*/
		$model_id = str_replace("'", "", $model_id);
		$tahun = str_replace("'", "", $tahun);
		$nopol = str_replace("'", "", $nopol);
		$warna = str_replace("'", "", $warna);
		$harga_sewa = str_replace("'", "", $harga_sewa);
		$status = str_replace("'", "", $status);
		$img = str_replace("'", "", $img);

		/*to bind param, so param not directly used in query and bound in separated way*/
		$this->db->bind(':model_id', $model_id);
		$this->db->bind(':tahun', $tahun);
		$this->db->bind(':nopol', $nopol);
		$this->db->bind(':warna', $warna);
		$this->db->bind(':harga_sewa', $harga_sewa);
		$this->db->bind(':status', $status);
		$this->db->bind(':img', $img);

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

	public function delete()
	{

	}
}