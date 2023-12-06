<?php

namespace controllers;

use core\Controller;

class Authorization extends Controller
{
	public function index()
	{
		$this->view("templates/header");
		$this->view("authorization/index");
		$this->view("templates/footer");
	}
}