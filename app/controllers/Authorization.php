<?php

namespace controllers;

use core\Controller;

class Authorization extends Controller
{
	public function index(): void
	{
		$data['title'] = "Login";
		$data['style'] = "";
		$this->view("authorization/index", $data);
	}

	public function loginVerify(): void
	{
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$data = [
				"username" => $_POST["username"],
				"password" => $_POST["password"],
				"remember" => ""
			];
			if (isset($_POST["remember"])) {
				$data["remember"] = $_POST["remember"];
			}

			$loginLocation = $this->model("Authorization")->verify($data["username"], $data["password"], $data["remember"]);
			unset($data);
			$controller = $loginLocation["controller"];
			$method = $loginLocation["method"];

			/*if some error in login occur*/
			if (count($loginLocation) === 3) {
				$_SESSION["flashMessage"]["login"] = $loginLocation["errorMessage"];
				header("Location: " . BASEURL . "/$controller/$method");
				return;
			}

			header("Location: " . BASEURL . "/$controller/$method");
		}
	}

	public function logout(): void
	{
		$this->model("Authorization")->logout();
	}
}