<?php

namespace controllers;

use core\Controller;

class Pelanggan extends Controller
{
	public function index(): void
	{
		$data['title'] = "Pelanggan";
		$data['style'] = "landingpage";
		$data['mobil'] = $this->model("Mobil")->getAllMobil();
		$this->view("templates/header", $data);
		$this->view("pelanggan/index", $data);
		$this->view("templates/footer");
	}

	public function module()
	{
		if ($_SERVER['REQUEST_METHOD'] == "POST")
		{
			$data['title'] = "Deskripsi";
			$data['style'] = "landingpage";
//			$data['mobil'] = $_POST['mobil'];
			$data['mobil'] = $this->model("Mobil")->getMobil($_POST['mobil']);
			$this->view("templates/header", $data);
			$this->view("pelanggan/" . $_POST['page'], $data);
			$this->view("templates/footer");
		}
	}
}