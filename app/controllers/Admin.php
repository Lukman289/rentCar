<?php

namespace controllers;

use core\Controller;

class Admin extends Controller
{
	public function index(): void
	{
		$data['title'] = "Admin";
		$data['style'] = "landingpage";
		$data['mobil'] = $this->model("Mobil")->getAllMobil();
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
				$data['mobil'] = $this->model("Mobil")->getAllMobil();
			} else {
				$data['mobil'] = $this->model("Mobil")->getMobil($_POST['mobil']);
			}

			$data['model'] = $this->model("Mobil")->getModel();
			$this->view("admin/templates/header", $data);
			if ($_POST['page'] == 'delete') {
				$data['delete'] = $this->model("Mobil")->delete($_POST['mobil']);
				$_POST['page'] = '../index';
				$data['mobil'] = $this->model("Mobil")->getAllMobil();
				$this->view("admin/module/" . $_POST['page'], $data);
			} else {
				$this->view("admin/module/" . $_POST['page'], $data);
			}
//			unset($_POST['mobil']);
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
//				'img' => null,
				'status' => $_POST['status']
			];

			if ($_POST['add'] == 1) {
				$data['message'] = $this->model("Admin")->add($data['add']);
			}


			$data['mobil'] = $this->model("Mobil")->getAllMobil();

			$this->view("admin/templates/header", $data);
			$this->view("admin/module/" . $_POST['page'], $data);
			$this->view("templates/footer");
		}
	}

}