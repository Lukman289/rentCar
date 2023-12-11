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
//		$data['mobil'] = ['Fortuner', 'Avanza', 'Pajero', 'Fortuner', 'Avanza', 'Pajero', 'Fortuner', 'Avanza', 'Pajero'];
		$this->view("templates/header", $data);
		$this->view("landingpage/index", $data);
		$this->view("templates/footer");
	}
}