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
		$data['kategori'] = $this->model("Mobil")->getAllKategori();
		$data['mobil'] = $this->model("Mobil")->getAllMobil();
		$this->view("admin/templates/header", $data);
		$this->view("admin/index", $data);
		$this->view("templates/footer");
	}


	public function sorting()
	{
		if ($_SERVER['REQUEST_METHOD'] == "POST") {
			$_SESSION['admin']['kategori_id'] = $_POST['kategori_id'];
			header("location: " . BASEURL . "/Admin/sorting");
		} else {
			$data['title'] = "Admin";
			$data['style'] = "landingpage";
			$data['add'] = "Mobil";
			$kategori = $_SESSION['admin']['kategori_id'];
			$data['kategori'] = $this->model("Mobil")->getAllKategori();
			$data['mobil'] = $this->model("Mobil")->getMobilFromKategori($kategori);
			$this->view("admin/templates/header", $data);
			$this->view("admin/index", $data);
			$this->view("templates/footer");
		}
	}

	/*Halaman Mobil*/
	public function pageEditMobil()
	{
		if ($_SERVER['REQUEST_METHOD'] == "POST") {
			$_SESSION['admin']['id_mobil'] = $_POST['id_mobil'];
			header("location: " . BASEURL . "/Admin/pageEditMobil");
		} else {
			$data['title'] = "Admin";
			$data['style'] = "landingpage";
			$data['add'] = "Mobil";
			$id_mobil = $_SESSION['admin']['id_mobil'];
			$data['kategori'] = $this->model("Mobil")->getAllKategori();
			$data['mobil'] = $this->model("Mobil")->getMobil($id_mobil);
			$this->view("admin/templates/header", $data);
			$this->view("admin/module/mobil/edit", $data);
			$this->view("templates/footer");
		}
	}

	public function pageAddMobil()
	{
		$data['title'] = "Admin";
		$data['style'] = "landingpage";
		$data['add'] = "Mobil";
		$data['kategori'] = $this->model("Mobil")->getAllKategori();
		$data['model'] = $this->model("Mobil")->getAllModel();
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

			$_SESSION["flashMessage"]["mobil"] = $this->model("Admin")->editMobil($data['edit']);
			header("location: " . BASEURL . "/Admin/index");
		}
	}

	public function addMobil()
	{
		if ($_SERVER['REQUEST_METHOD'] == "POST")
		{
			$data = [
				'id_model' => $_POST['id_model'],
				'tahun' => $_POST['tahun'],
				'nopol' => $_POST['nopol'],
				'warna' => $_POST['warna'],
				'harga_sewa' => $_POST['harga'],
				'status' => $_POST['status']
			];

			if (isset($_FILES['img'])) {
				$imageData = [
					'name' => $_FILES['img']['name'],
					'tmp_name' => $_FILES['img']['tmp_name']
				];
				$data['img'] = $imageData;
			}

			$_SESSION["flashMessage"]["mobil"] = $this->model("Admin")->addMobil($data);
			header("location: " . BASEURL . "/Admin/index");
		}
	}

	public function deleteMobil()
	{
		if ($_SERVER['REQUEST_METHOD'] == "POST") {
			$_SESSION["flashMessage"]["mobil"] = $this->model("Admin")->deleteMobil($_POST['id_mobil']);
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

			$user = $_POST['user'];
			unset($_POST["userLevel"]);
			unset($_POST['username']);
			unset($_POST['password']);
			unset($_POST["conditionFk"]);
			unset($_POST["user"]);

			foreach ($_POST as $column => $value) {
				$data[$column] = $value;
			}

			$_SESSION["flashMessage"]["$userLevel"] = $this->model("Admin")->edit("$user", $data, $fkData);
			unset($data);
			header("Location: " . BASEURL . "/Admin/page" . ucfirst($user));
		}
	}

	public function addUser(): void
	{
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$data = [];
			$userLevel = $_POST['userLevel'];
			$fkData = [
				"user" => [
					"username" => $_POST["username"],
					"password" => $_POST["password"],
					"level" => strtolower($userLevel)
				]
			];
			$user = $_POST['user'];
			unset($_POST["userLevel"]);
			unset($_POST['username']);
			unset($_POST['password']);
			unset($_POST['user']);

			foreach ($_POST as $column => $value) {
				$data[$column] = $value;
			}

			$_SESSION["flashMessage"]["$user"] = $this->model("Admin")->add("$user", $data, $fkData);
			unset($data);
			header("Location: " .  BASEURL . "/Admin/page" . ucfirst($user));
		}
	}

	public function deleteUser(): void
	{
		if ($_SERVER['REQUEST_METHOD'] == "POST") {
			$userLevel = $_POST['user'];
			$idData = intval($_POST['idData']);
			$idName = $_POST['idName'];

			var_dump($_POST);
			var_dump($idData . ' bertipe = ' . gettype($idData));
			$_SESSION["flashMessage"]["$userLevel"] = $this->model("Admin")->delete("$userLevel", $idName, $idData);
			header("Location: " .  BASEURL . "/Admin/page" . ucfirst($userLevel));
		}
	}

	/*Halaman Karyawan*/
	public function pageKaryawan()
	{
		$data['title'] = "Admin";
		$data['style'] = "landingpage";
		$data['add'] = "Karyawan";
		$data['karyawan'] = $this->model("Admin")->getAllKaryawan();
		$this->view("admin/templates/header", $data);
		$this->view("admin/module/karyawan/index", $data);
		$this->view("templates/footer");
	}

	public function pageEditKaryawan()
	{
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$_SESSION['admin']['id_karyawan'] = $_POST["id_karyawan"];
			header("location: " . BASEURL . "/Admin/pageEditKaryawan");
		} else {
			$data['title'] = "Admin";
			$data['style'] = "landingpage";
			$data['add'] = "Karyawan";
			$id = $_SESSION['admin']['id_karyawan'];
			$data['karyawan'] = $this->model("Admin")->getKaryawan($id);
			$this->view("admin/templates/header", $data);
			$this->view("admin/module/karyawan/edit", $data);
			$this->view("templates/footer");
		}
	}

	public function pageAddKaryawan()
	{
		$data['title'] = "Admin";
		$data['style'] = "landingpage";
		$data['add'] = "Karyawan";
		$this->view("admin/templates/header", $data);
		$this->view("admin/module/karyawan/add", $data);
		$this->view("templates/footer");
	}

	/*Halaman Pemesanan*/
	public function pagePemesanan()
	{
		$data['title'] = "Admin";
		$data['style'] = "landingpage";
		$data['add'] = "Pemesanan";
		$data['pemesanan'] = $this->model("Admin")->getAllPemesanan();
		$this->view("admin/templates/header", $data);
		$this->view("admin/module/pemesanan/index", $data);
		$this->view("templates/footer");
	}

	public function pageAddPemesanan()
	{
		$data['title'] = "Admin";
		$data['style'] = "landingpage";
		$data['add'] = "Pemesanan";
		$this->view("admin/templates/header", $data);
		$this->view("admin/module/pemesanan/add", $data);
		$this->view("templates/footer");
	}

	/*Halaman Pelanggan*/
	public function pagePelanggan()
	{
		$data['title'] = "Admin";
		$data['style'] = "landingpage";
		$data['add'] = "Pelanggan";
		$data['pelanggan'] = $this->model("Admin")->getAllPelanggan();
		$this->view("admin/templates/header", $data);
		$this->view("admin/module/pelanggan/index", $data);
		$this->view("templates/footer");
	}

	public function pageAddPelanggan()
	{
		$data['title'] = "Admin";
		$data['style'] = "landingpage";
		$data['add'] = "Pelanggan";
		$this->view("admin/templates/header", $data);
		$this->view("admin/module/pelanggan/add", $data);
		$this->view("templates/footer");
	}

	public function pageEditPelanggan()
	{
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$_SESSION['admin']['id_pelanggan'] = $_POST['id_pelanggan'];
			header("location: " . BASEURL . "/Admin/pageEditPelanggan");
		} else {
			$data['title'] = "Admin";
			$data['style'] = "landingpage";
			$data['add'] = "Pelanggan";
			$id = $_SESSION['admin']['id_pelanggan'];
			$data['pelanggan'] = $this->model("Admin")->getPelanggan($id);
			var_dump($_POST['id_pelanggan']);
			$this->view("admin/templates/header", $data);
			$this->view("admin/module/pelanggan/edit", $data);
			$this->view("templates/footer");
		}
	}
}