<?php

namespace controllers;

use core\Controller;

class Admin extends Controller
{
	public function index(): void
	{
		$data['title'] = "Admin";
		$data['style'] = "landingpage";
		$data['mobil'] = $this->model("LandingPage")->getMobil();
		$this->view("admin/templates/header", $data);
		$this->view("admin/index", $data);
		$this->view("templates/footer");
	}

	public function module(): void
	{
		if ($_SERVER['REQUEST_METHOD'] == "POST")
		{
			$data['title'] = "Admin";
			$data['style'] = "landingpage";
			if ($_POST['mobil'] == null) {
				$data['mobil'] = $this->model("LandingPage")->getMobil();
			} else {
				$data['mobil'] = $this->model("Mobil")->getMobil($_POST['mobil']);
			}
			$data['model'] = $this->model("Mobil")->getModel();
			$this->view("admin/templates/header", $data);
			$this->view("admin/module/" . $_POST['page'], $data);
			$this->view("templates/footer");
		}
	}

	public function edit()
	{
		if ($_SERVER['REQUEST_METHOD'] == "POST")
		{
			$data['title'] = "Admin";
			$data['style'] = "landingpage";
			$data['edit'] = [
				'nopol' => $_POST['nopol'],
				'warna' => $_POST['warna'],
				'harga' => $_POST['harga'],
				'status' => $_POST['status'],
				'id_mobil' => $_POST['mobil']
			];

			$data['message'] = $this->model("Admin")->edit($data['edit']);
			$data['mobil'] = $this->model("Mobil")->getMobil($_POST['mobil']);
			$this->view("admin/templates/header", $data);
			$this->view("admin/module/" . $_POST['page'], $data);
			$this->view("templates/footer");
		}
	}

	public function add()
	{
		if ($_SERVER['REQUEST_METHOD'] == "POST")
		{
			$data['title'] = "Admin";
			$data['style'] = "landingpage";
			$data['model'] = $this->model("Mobil")->getModel();
			$data['add'] = [
				'id_model' => $_POST['id_model'],
				'tahun' => $_POST['tahun'],
				'nopol' => $_POST['nopol'],
				'warna' => $_POST['warna'],
				'harga_sewa' => $_POST['harga'],
				'img' => $_POST['img'],
				'status' => $_POST['status']
			];

			$data['message'] = $this->model("Admin")->add($data['add']);

			$data['mobil'] = $this->model("Mobil")->getAllMobil();

			$this->view("admin/templates/header", $data);
			$this->view("admin/module/" . $_POST['page'], $data);
			$this->view("templates/footer");
		}
	}

}