<div class="container mt-5">
    <div class="card mb-3">
        <div class="row g-0">
			<?php $mobil = $data['mobil']; ?>
                <div class="col-md-4">
                    <img src="<?=BASEURL?>/img/imgMobil/<?=$mobil['img']?>" class="img-fluid rounded-start" alt="">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h2 class="card-title"><?=$mobil['model']?></h2>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><small class="text-muted">Merek
                                : <?=$mobil['merek']?></small></li>
                        <li class="list-group-item"><small class="text-muted">Warna
                                : <?=$mobil['warna']?></small></li>
                        <li class="list-group-item"><small class="text-muted">Tahun
                                : <?=$mobil['tahun']?></small></li>
                        <li class="list-group-item"><small class="text-muted">Harga
                                : Rp.<?= number_format($mobil['harga_sewa'], 0, ',', '.')?></small></li>
                    </ul>
                    <div class="card-body text-end">
                        <a href="<?=BASEURL?>/Pelanggan/index" class="btn btn-primary">Kembali</a>
                    </div>
                </div>
        </div>
    </div>



