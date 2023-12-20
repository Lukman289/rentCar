<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="<?=BASEURL?> /css/authorization.css">
	<title><?=$data['title']?></title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
<div class="login-container">
	<h2>RentCar</h2>
	<?php
		if (isset($_SESSION["flashMessage"]["login"])) {
			echo($_SESSION["flashMessage"]["login"]);
			unset($_SESSION["flashMessage"]["login"]);
		}
	?>
	<form action="<?=BASEURL?>/Authorization/loginVerify" method="post">
		<div class="form-group">
			<label for="username">Username:</label>
			<input type="text" id="username" name="username" required>
		</div>

		<div class="form-group">
			<label for="password">Password:</label>
			<input type="password" id="password" name="password" required>
		</div>

		<button type="submit" class="login-button">Login</button>
	</form>
</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>
</html>