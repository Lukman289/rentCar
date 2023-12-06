<?php

namespace controllers;

use core\Controller;

class Pelanggan extends Controller
{
	public function index()
	{
		$this->view("templates/header");
		$this->view("pelanggan/index");
		$this->view("templates/footer");
	}
}