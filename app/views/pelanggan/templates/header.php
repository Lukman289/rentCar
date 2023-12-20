<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?=$data['title']?></title>
    <link rel="stylesheet" href="<?=BASEURL?> /css/header.css">
    <link rel="stylesheet" href="<?=BASEURL?> /css/<?=$data['style']?>.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
<header class="menu__wrapper">
	<div class="menu__bar">
        <div class="dropdown-left">
            <button class="btn btn-primary" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                rentCar
            </button>
            <ul class="dropdown-menu">
                <li>
                    <a href="<?=BASEURL?>/Authorization/logout" class="dropdown-item">Sign Out</a>
                </li>
            </ul>
        </div>
		<nav>
			<ul class="navigation">
				<li>
                    <div class="dropdown-center">
                        <a href="<?=BASEURL?>/Pelanggan/index" class="btn btn-primary">Home</a>
                        <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Kategori
                        </button>
                        <form action="<?=BASEURL?>/Pelanggan/sorting" method="post">
                        <ul class="dropdown-menu">
                            <?php foreach ($data['kategori'] as $ktg): ?>
                            <li>
                                <button type="submit" class="dropdown-item" name="kategori_id" value="<?=$ktg['id_kategori']?>"><?=$ktg['kategori']?></button>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                        </form>
                    </div>
				</li>
			</ul>
		</nav>
	</div>
</header>
<br>