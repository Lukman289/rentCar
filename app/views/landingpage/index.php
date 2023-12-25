<style>
    .containerM {
        margin: 4rem 8rem 2rem 8rem;
    }
</style>

<div class="containerM">
    <div class="row row-cols-1 row-cols-md-auto g-4">
		<?php
        if ($data['mobil'] == null ) { ?>
            <div class="col" style="margin: auto">
                <h2>
                    <strong>
                        Data Mobil Kosong!!!
                    </strong>
                </h2>
            </div>
        <?php }
        foreach ($data['mobil'] as $mobil) :?>
            <div class="col">
                <form action="<?=BASEURL?>/Mobil" method="post">
                    <div class="card" style="height: auto; width: 18rem">
                        <img src="<?=BASEURL?>/img/imgMobil/<?=$mobil['img']?>" class="card-img-top" alt="" style="width: 100%; height: 55%">
                        <div class="card-body">
                            <h5 class="card-title"><?=$mobil['model']?></h5>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><small class="text-muted"><?=$mobil['merek']?></small>
                                </li>
                                <li class="list-group-item"><small class="text-muted"><?=$mobil['tahun']?></small>
                                </li>
                                <li class="list-group-item"><small class="text-muted">
                                        Rp.<?= number_format($mobil['harga'], 0, ',', '.')?>
                                    </small></li>
                            </ul>
                            <div class="card-body text-end">
                                <button type="submit" value="<?=$mobil['id_mobil']?>" name="mobil" class="btn btn-outline-info">Lihat</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
		<?php endforeach; ?>
    </div>
</div>