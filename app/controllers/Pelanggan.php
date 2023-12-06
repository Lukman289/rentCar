<?php

namespace controllers;

use core\Controller;

class Pelanggan extends Controller
{
	public function index()
	{
		$data['title'] = "Pelanggan";
		$data['style'] = "pelanggan";
		$this->view("templates/header", $data);
		$this->view("pelanggan/index");
		$this->view("templates/footer");
	}
}