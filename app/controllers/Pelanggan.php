<?php

namespace controllers;

use core\Controller;

class Pelanggan extends Controller
{
	public function index()
	{
		$data['title'] = "Pelanggan";
		$data['style'] = "landingpage";
		$data['mobil'] = ['Fortuner', 'Avanza', 'Pajero', 'Fortuner', 'Avanza', 'Pajero', 'Fortuner', 'Avanza', 'Pajero'];
		$this->view("templates/header", $data);
		$this->view("pelanggan/index", $data);
		$this->view("templates/footer");
	}
}