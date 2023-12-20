<?php

namespace controllers;

use core\Controller;
class Mobil extends  Controller
{
	public function index(): void
	{
		if ($_SERVER['REQUEST_METHOD'] == "POST")
		{
			$_SESSION['mobil']['mobil_id'] = $_POST['mobil'];
			header("location: " . BASEURL . "/Mobil/index");
		} else {
			$data['title'] = "Deskripsi";
			$data['style'] = "landingpage";
			$mobil = $_SESSION['mobil']['mobil_id'];
			$data['mobil'] = $this->model("Mobil")->getMobil($mobil);
			$this->view("templates/header", $data);
			$this->view("mobil/index", $data);
			$this->view("templates/footer");
		}
	}
}