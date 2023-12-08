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
        <div class="action-buttons hide">
            <a href="<?=BASEURL?>/Authorization/index" title="Log in" class="login">Log In</a>
        </div>
		<nav>
			<ul class="navigation">
				<li>
                    <div class="dropdown-center">
                        <a href="<?=BASEURL?>" class="btn btn-primary">Home</a>
                        <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Kategori
                        </button>
                        <form action="" method="post">
                        <ul class="dropdown-menu">
                            <li>
                                <button type="submit" class="dropdown-item" value="Honda" >Honda</button>
                            </li>
                            <li>
                                <button type="submit" class="dropdown-item" value="Mitsubishi">Mitsubishi</button>
                            </li>
                            <li>
                                <button type="submit" class="dropdown-item" value="Toyota">Toyota</button>
                            </li>
                        </ul>
                        </form>
                    </div>
				</li>
			</ul>
		</nav>
	</div>
    <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-light" type="submit">Search</button>
    </form>
</header>
<br>