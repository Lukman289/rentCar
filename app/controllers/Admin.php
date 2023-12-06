<?php

namespace controllers;

use core\Controller;

class Admin extends Controller
{
	public function index()
	{
		$data['title'] = "Admin";
		$data['style'] = "admin";
		$this->view("templates/header");
		$this->view("admin/index", $data);
		$this->view("templates/footer");
	}
}