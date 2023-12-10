<?php

namespace controllers;

use core\Controller;
class Mobil extends  Controller
{
	public function index()
	{
		if ($_SERVER['REQUEST_METHOD'] == "POST")
		{
			$data['title'] = "Deskripsi";
			$data['style'] = "landingpage";
//			$data['mobil'] = $_POST['mobil'];
			$data['mobil'] = $this->model("Mobil")->getMobil($_POST['mobil']);
			$this->view("templates/header", $data);
			$this->view("mobil/index", $data);
			$this->view("templates/footer");
		}
	}
}