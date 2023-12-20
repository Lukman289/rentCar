<?php

namespace controllers;

use core\Controller;

class Pelanggan extends Controller
{
	public function index(): void
	{
		$data['title'] = "Pelanggan";
		$data['style'] = "landingpage";
		$data['kategori'] = $this->model("Mobil")->getAllKategori();
		$data['mobil'] = $this->model("Mobil")->getAllMobil();
		$this->view("pelanggan/templates/header", $data);
		$this->view("pelanggan/index", $data);
		$this->view("templates/footer");
	}

	public function sorting()
	{
		if ($_SERVER['REQUEST_METHOD'] == "POST") {
			$_SESSION['lp']['kategori_id'] = $_POST['kategori_id'];
			header("location: " . BASEURL . "/Pelanggan/sorting");
		} else {
			$data['title'] = "Pelanggan";
			$data['style'] = "landingpage";
			$kategori = $_SESSION['lp']['kategori_id'];
			$data['kategori'] = $this->model("Mobil")->getAllKategori();
			$data['mobil'] = $this->model("Mobil")->getMobilFromKategori($kategori);
			$this->view("templates/header", $data);
			$this->view("pelanggan/index", $data);
			$this->view("templates/footer");
		}
	}

	public function pageLihat()
	{
		if ($_SERVER['REQUEST_METHOD'] == "POST") {
			$_SESSION['pelanggan']['id_mobil'] = $_POST['id_mobil'];
			header("location: " . BASEURL . "/Pelanggan/pageLihat");
		} else {
			$data['title'] = "Pelanggan";
			$data['style'] = "landingpage";
			$id_mobil = $_SESSION['pelanggan']['id_mobil'];
			$data['mobil'] = $this->model("Mobil")->getMobil($_POST['id_mobil']);
			$this->view("pelanggan/templates/header", $data);
			$this->view("pelanggan/lihat", $data);
			$this->view("templates/footer");
		}
	}

	public function pageRental()
	{
		if ($_SERVER['REQUEST_METHOD'] == "POST") {
			$_SESSION['pelanggan']['id_mobil'] = $_POST['id_mobil'];
			header("location: " . BASEURL . "/Pelanggan/pageRental");
		} else {
			$data['title'] = "Pelanggan";
			$data['style'] = "landingpage";
			$id_mobil = $_SESSION['pelanggan']['id_mobil'];
			$data['pelanggan'] = $this->model('Pelanggan')->getPelanggan($_SESSION['username']);
			$data['mobil'] = $this->model("Mobil")->getMobil($id_mobil);
			$this->view("pelanggan/templates/header", $data);
			$this->view("pelanggan/rental", $data);
			$this->view("templates/footer");
		}
	}

	public function addRental()
	{
		if ($_SERVER['REQUEST_METHOD'] == "POST") {
			$data = [];

			foreach ($_POST as $column => $value) {
				$data[$column] = $value;
			}

			var_dump($data);
			var_dump($_SESSION['username']);

			$_SESSION['flashMessage']['rental'] = $this->model('Pelanggan')->addPemesanan($data);
			$this->index();
		} else {
			$this->index();
		}
	}
}