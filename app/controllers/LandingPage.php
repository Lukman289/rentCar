<?php

namespace controllers;

use core\Controller;

class LandingPage extends Controller
{
	public function index()
	{
		$this->view("templates/header");
		$this->view("landingpage/index");
		$this->view("templates/footer");
	}
}