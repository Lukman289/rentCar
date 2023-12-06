<?php

namespace controllers;

use core\Controller;

class LandingPage extends Controller
{
	public function index()
	{
		$data['title'] = "Home";
		$data['style'] = "landingpage";
		$data['mobil'] = ['Fortuner', 'Avanza', 'Pajero'];
		$this->view("templates/header", $data);
		$this->view("landingpage/index", $data);
//		$this->view("templates/footer");
	}
}