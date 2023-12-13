<?php

namespace controllers;

use core\Controller;

class Admin extends Controller
{
	public function index(): void
	{
		$data['title'] = "Admin";
		$data['style'] = "landingpage";
		$data['add'] = "Mobil";
		$data['mobil'] = $this->model("Mobil")->getAllMobil();
		$this->view("admin/templates/header", $data);
		$this->view("admin/index", $data);
		$this->view("templates/footer");
	}


	/*Halaman Mobil*/
	public function pageMobil()
	{
		$data['title'] = "Admin";
		$data['style'] = "landingpage";
		$data['add'] = "Mobil";
		$data['mobil'] = $this->model("Mobil")->getAllMobil();
		$this->view("admin/templates/header", $data);
		$this->view("admin/index", $data);
		$this->view("templates/footer");
	}

	public function pageEditMobil()
	{
		$data['title'] = "Admin";
		$data['style'] = "landingpage";
		$data['mobil'] = $this->model("Mobil")->getMobil($_POST['id_mobil']);
		$this->view("admin/templates/header", $data);
		$this->view("admin/module/mobil/edit", $data);
		$this->view("templates/footer");
	}

	public function pageAddMobil()
	{
		$data['title'] = "Admin";
		$data['style'] = "landingpage";
		$data['mobil'] = $this->model("Mobil")->getMobil($_POST['id_mobil']);
		$data['model'] = $this->model("Mobil")->getModel();
		$this->view("admin/templates/header", $data);
		$this->view("admin/module/mobil/add", $data);
		$this->view("templates/footer");
	}

	public function editMobil()
	{
		if ($_SERVER['REQUEST_METHOD'] == "POST")
		{
			$data['title'] = "Admin";
			$data['style'] = "landingpage";
			$data['edit'] = [
				'nopol' => $_POST['nopol'],
				'warna' => $_POST['warna'],
				'harga' => $_POST['harga'],
				'status' => $_POST['status'],
				'id_mobil' => $_POST['mobil']
			];

			$_SESSION["flashMessage"]["mobil"] = $this->model("Admin")->edit($data['edit']);
			header("location: " . BASEURL . "/Admin/index");
		}
	}

	public function addMobil()
	{
		if ($_SERVER['REQUEST_METHOD'] == "POST")
		{
			$data['title'] = "Admin";
			$data['style'] = "landingpage";
			$data['add'] = [
				'id_model' => $_POST['id_model'],
				'tahun' => $_POST['tahun'],
				'nopol' => $_POST['nopol'],
				'warna' => $_POST['warna'],
				'harga_sewa' => $_POST['harga'],
				'status' => $_POST['status']
			];
			$_SESSION["flashMessage"]["mobil"] = $this->model("Admin")->add($data['add']);
			header("location: " . BASEURL . "/Admin/index");
		}
	}

	public function deleteMobil()
	{
		if ($_SERVER['REQUEST_METHOD'] == "POST") {
			$data['delete'] = $this->model("Admin")->deleteMobil($_POST['id_mobil']);
			header("location: " . BASEURL . "/Admin/index");
		}
	}

	public function editUser(): void
	{
		if ($_SERVER['REQUEST_METHOD'] == "POST") {
			$data = [];

			/*receive data that non insertData and unset that*/
			$userLevel = $_POST['userLevel'];
			$fkData = [
				"user" => [
					"username" => $_POST["username"],
					"password" => $_POST["password"],
					"level" => strtolower($userLevel),
					"conditionEdit" => "id_user = " . $_POST["conditionFk"],
				],
			];
			unset($_POST["userLevel"]);
			unset($_POST['username']);
			unset($_POST['password']);
			unset($_POST["conditionFk"]);


			foreach ($_POST as $column => $value) {
				$data[$column] = $value;
			}

			$_SESSION["flashMessage"]["$userLevel"] = $this->model("Admin")->edit("$userLevel", $data, $fkData);
			unset($data);
			header("Location: " . BASEURL . "/Admin/page" . ucfirst($userLevel));
		}
	}

	public function addUser(): void
	{
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$data = [];

			/*receive data that non insertData and unset that*/
			$userLevel = $_POST['userLevel'];
			$fkData = [
				"user" => [
					"username" => $_POST["username"],
					"password" => $_POST["password"],
					"level" => strtolower($userLevel)
				]
			];
			unset($_POST["userLevel"]);
			unset($_POST['username']);
			unset($_POST['password']);


			foreach ($_POST as $column => $value) {
				$data[$column] = $value;
			}

			$_SESSION["flashMessage"]["$userLevel"] = $this->model("Admin")->add("$userLevel", $data, $fkData);
			unset($data);
			header("Location: " .  BASEURL . "/Admin/page" . ucfirst($userLevel));
		}
	}

	/*Halaman Karyawan*/
	public function pageKaryawan()
	{
		$data['title'] = "Admin";
		$data['style'] = "landingpage";
		$data['add'] = "Karyawan";
		$data['karyawan'] = $this->model("Karyawan")->getAllKaryawan();
		$this->view("admin/templates/header", $data);
		$this->view("admin/module/karyawan/index", $data);
		$this->view("templates/footer");
	}

	public function pageEditKaryawan()
	{
		$data['title'] = "Admin";
		$data['style'] = "landingpage";
		$data['add'] = "Karyawan";
//		$data['karyawan'] = $this->model("Mobil")->getKaryawan($_POST['id_karyawan']);
		$this->view("admin/templates/header", $data);
		$this->view("admin/module/karyawan/edit", $data);
		$this->view("templates/footer");
	}

	public function pageAddKaryawan()
	{
		$data['title'] = "Admin";
		$data['style'] = "landingpage";
		$data['add'] = "Karyawan";
//		$data['karyawan'] = $this->model("Admin")->getKaryawan($_POST['id_karyawan']);
		$this->view("admin/templates/header", $data);
		$this->view("admin/module/karyawan/add", $data);
		$this->view("templates/footer");
	}

	public function editKaryawan()
	{
		if ($_SERVER['REQUEST_METHOD'] == "POST")
		{
			$data['title'] = "Admin";
			$data['style'] = "landingpage";
			$data['add'] = "Karyawan";
			$data['edit'] = [
				'nopol' => $_POST['nopol'],
				'warna' => $_POST['warna'],
				'harga' => $_POST['harga'],
				'status' => $_POST['status'],
				'id_mobil' => $_POST['mobil']
			];

			$data['message'] = $this->model("Admin")->edit($data['edit']);
			$data['mobil'] = $this->model("Mobil")->getMobil($_POST['mobil']);
			$this->view("admin/templates/header", $data);
			$this->view("admin/module/" . $_POST['page'], $data);
			$this->view("templates/footer");
		}
	}

	public function deleteKaryawan()
	{
		if ($_SERVER['REQUEST_METHOD'] == "POST") {
//			$data['delete'] = $this->model("Mobil")->delete($_POST['id_mobil']);
//			setcookie("cek", $_GET['id_mobil'], time() + 1, "/");
			header("location: " . BASEURL . "/Admin/index");
		}
	}

	/*Halaman Pemesanan*/
	public function pagePemesanan()
	{
		$data['title'] = "Admin";
		$data['style'] = "landingpage";
		$data['add'] = "Pemesanan";
//		$data['pemesanan'] = $this->model("Mobil")->getAllPemesanan();
		$this->view("admin/templates/header", $data);
		$this->view("admin/module/pemesanan/index", $data);
		$this->view("templates/footer");
	}

	public function pageAddPemesanan()
	{
		$data['title'] = "Admin";
		$data['style'] = "landingpage";
		$data['add'] = "Pemesanan";
//		$data['pemesanan'] = $this->model("Mobil")->getAllPemesanan();
		$this->view("admin/templates/header", $data);
		$this->view("admin/module/pemesanan/add", $data);
		$this->view("templates/footer");
	}

	public function deletePemesanan()
	{
		if ($_SERVER['REQUEST_METHOD'] == "POST") {
			header("location: " . BASEURL . "/Admin/index");
		}
	}

	/*Halaman Pelanggan*/
	public function pagePelanggan()
	{
		$data['title'] = "Admin";
		$data['style'] = "landingpage";
		$data['add'] = "Pelanggan";
		$data['pelanggan'] = $this->model("Pelanggan")->getAllPelanggan();
		$this->view("admin/templates/header", $data);
		$this->view("admin/module/pelanggan/index", $data);
		$this->view("templates/footer");
	}

	public function pageAddPelanggan()
	{
		$data['title'] = "Admin";
		$data['style'] = "landingpage";
		$data['add'] = "Pelanggan";
//		$data['pelanggan'] = $this->model("Pelanggan")->getAllPelanggan();
		$this->view("admin/templates/header", $data);
		$this->view("admin/module/pelanggan/add", $data);
		$this->view("templates/footer");
	}

	public function pageEditPelanggan()
	{
		$data['title'] = "Admin";
		$data['style'] = "landingpage";
		$data['add'] = "Pelanggan";
//		$data['pelanggan'] = $this->model("Pelanggan")->getAllPelanggan();
		$this->view("admin/templates/header", $data);
		$this->view("admin/module/pelanggan/edit", $data);
		$this->view("templates/footer");
	}

	public function deletePelanggan()
	{
		if ($_SERVER['REQUEST_METHOD'] == "POST") {
			header("location: " . BASEURL . "/Admin/index");
		}
	}
}