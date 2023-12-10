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
        <div class="dropdown-left">
            <form action="<?=BASEURL?>/Admin/module" method="post">
            <button class="btn btn-primary" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                rentCar
            </button>
                <ul class="dropdown-menu">
                    <li>
                        <button type="submit" class="dropdown-item" name="page" value="../index">Mobil</button>
                    </li>
                    <li>
                        <button type="submit" class="dropdown-item" name="page" value="karyawan/index">Karyawan</button>
                    </li>
                    <li>
                        <button type="submit" class="dropdown-item" name="page" value="pemesanan/index">Pemesanan</button>
                    </li>
                    <li>
                        <button type="submit" class="dropdown-item" name="page" value="pelanggan/index">Pelanggan</button>
                    </li>
                    <li>
                        <a href="<?=BASEURL?>" class="dropdown-item">Sign Out</a>
                    </li>
                </ul>
            </form>
        </div>
        <nav>
            <ul class="navigation">
                <li>
                    <div class="dropdown-center">
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
        <div class="ms-4">
            <!--            <form action="--><? //=BASEURL?><!--/Admin/module" method="post">-->
            <!--                <input type="hidden" value="--><? //=$mobil['id']?><!--" name="mobil">-->
            <form action="<?=BASEURL?>/Admin/module" method="post">
                <input type="hidden" value="mobil/add" name="page">
                <button type="submit" class="btn btn-primary">ADD</button>
            </form>
        </div>
    </div>
    <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-light" type="submit">Search</button>
    </form>
</header>
<br>