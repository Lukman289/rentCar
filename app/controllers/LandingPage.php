<?php

namespace controllers;

use core\Controller;

class LandingPage extends Controller
{
	public function index(): void
	{
		$data['title'] = "Home";
		$data['style'] = "landingpage";
		$data['mobil'] = $this->model("Mobil")->getAllMobil();
		$data['kategori'] = $this->model("Mobil")->getAllKategori();
//		$data['mobil'] = ['Fortuner', 'Avanza', 'Pajero', 'Fortuner', 'Avanza', 'Pajero', 'Fortuner', 'Avanza', 'Pajero'];
		$this->view("templates/header", $data);
		$this->view("landingpage/index", $data);
		$this->view("templates/footer");
	}

	public function sorting()
	{
		if ($_SERVER['REQUEST_METHOD'] == "POST") {
			$_SESSION['lp']['kategori_id'] = $_POST['kategori_id'];
			header("location: " . BASEURL . "/LandingPage/sorting");
		} else {
			$data['title'] = "Pelanggan";
			$data['style'] = "landingpage";
			$kategori = $_SESSION['lp']['kategori_id'];
			$data['kategori'] = $this->model("Mobil")->getAllKategori();
			$data['mobil'] = $this->model("Mobil")->getMobilFromKategori($kategori);
			$this->view("templates/header", $data);
			$this->view("landingpage/index", $data);
			$this->view("templates/footer");
		}
	}
}