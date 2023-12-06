<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?=$data['title']?></title>
    <link rel="stylesheet" href="<?=BASEURL?>/css/header.css">
    <link rel="stylesheet" href="<?=BASEURL?>/css/<?=$data['style']?>.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
<header class="menu__wrapper">
	<div class="menu__bar">
		<a href="http://localhost/manut_ruangbaca_ti_2d/public/Home" title="Home" aria-label="home" class="logo">
		</a>
		<nav>
			<ul class="navigation hide">
				<li>
					<a href="http://localhost/manut_ruangbaca_ti_2d/public/Home" title="Customers">Katalog</a>
				</li>
				<li>
					<a href="http://localhost/manut_ruangbaca_ti_2d/public/Buku" title="Docs">Buku</a>
				</li>
				<li>
					<a href="http://localhost/manut_ruangbaca_ti_2d/public/Anggota" title="Templates">Anggota</a>
				</li>
				<li>
					<button>Akses<i class="material-icons">expand_more</i>
					</button>
					<div class="dropdown__wrapper">
						<div class="dropdown">
							<ul class="list-items-with-description">
								<li>
									<div class="item-title">
										<h3>Peminjaman</h3>
										<p>Akses Peminjaman</p>
									</div>
								</li>
								<li>
									<div class="item-title">
										<h3>Riwayat</h3>
										<p>Akses Riwayat</p>
									</div>
								</li>
							</ul>
						</div>
					</div>
				</li>
			</ul>
		</nav>
	</div>
	<div class="action-buttons hide">
		<a href="<?=BASEURL?>/Authorization/index" title="Log in" class="login">Log In</a>
	</div>
</header>
<br>