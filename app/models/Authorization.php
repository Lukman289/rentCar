<?php

namespace models;

use core\Database;
use core\FlashMessage;

class Authorization
{
	private Database $db;
	private FlashMessage $fm;

	public function __construct()
	{
		$this->fm = new FlashMessage();
		$this->db = new Database();
	}

	public function __destruct() {
		unset($this->db);
	}

	public function cookieVerify(): array
	{
		if (isset($_COOKIE["id"]) && isset($_COOKIE["username"])) {
			$id = $_COOKIE["id"];
			$username = $_COOKIE["username"];

			/*prepare our query syntax*/
			$this->db->prepare("SELECT id_user, username, password, salt, level FROM [user] WHERE id_user =:id_user");

			/*to bind param, so param not directly used in query and bound in separated way*/
			$this->db->bind(':id_user', $id);

			/*execute query when safe*/
			$row = $this->db->single();

			if ($username !== hash("sha256", $row["username"])) {
				return [];
			}

			$controller = $row["level"];
			$method = "index";
			return ["controller" => $controller, "method" => $method];
		}
		return [];
	}

	public function verify(string $username, string $password, $remember = ""): array
	{
		/*prepare our query syntax*/
		$this->db->prepare("SELECT id_user, username, password, salt, level FROM [user] WHERE username =:username");

		/*to escape special character*/
		$username = $this->db->antiDbInjection($username);
		$password = $this->db->antiDbInjection($password);

		/*replace quoted string("''") to regular string(""), because we're using that value to bind function*/
		$username = str_replace("'", "", $username);
		$password = str_replace("'", "", $password);

		/*to bind param, so param not directly used in query and bound in separated way*/
		$this->db->bind(':username', $username);

		/*execute query when safe*/
		$row = $this->db->single();

		/*when query is false because username is wrong*/
		if (!$row) {
			$this->fm->message("warning", "Username not Found");
			$controller = "Authorization";
			$method = "index";
			$message = $this->fm->getFlashData("warning");
			return ["controller" => $controller, "method" => $method, "errorMessage" => $message];
		}

		$salt = $row['salt'];
//		$userPassword = $row['password'];
//		$inputPassword = $password . $salt;
		/*checking with hash() method wit algorithm sha256, cause in our
		database, password is hashed with sha2_256, and to check that we
		can't use password verify() method with default hash algorithm*/
//		$inputPassword = hash("sha256", $inputPassword, true);
//		if (!($userPassword === $inputPassword))
		$inputPassword = $password . $salt;
		$userPassword = password_hash(($row["password"] . $salt ), PASSWORD_DEFAULT);;
		if (!password_verify($inputPassword, $userPassword)){
			$this->fm->message("danger", "Password is Wrong");
			$controller = "Authorization";
			$method = "index";
			$message = $this->fm->getFlashData("danger");
			return ["controller" => $controller, "method" => $method, "errorMessage"=> $message];
		}

		$_SESSION["username"] = $row["username"];

		if ($remember) {
			setcookie("id", $row["id_user"], time() + 300, "/");
			setcookie("username", hash("sha256", $username), time()+300, "/");
		}

		$controller = $row["level"];
		$method = "index";
		return ["controller" => $controller, "method" => $method];
	}

	public function logout()
	{

	}

}