<style>
    .containerM {
        margin: 4rem 8rem 2rem 8rem;
    }
</style>

<div class="containerM">
    <?php if (isset($_SESSION['flashMessage']['rental'])) {
        echo $_SESSION['flashMessage']['rental'];
	    unset($_SESSION['flashMessage']['rental']);
    }
    ?>
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
                <div class="card" style="height: auto; width: 18rem">
                    <img src="<?=BASEURL?>/img/imgMobil/<?=$mobil['img']?>" class="card-img-top" alt="" style="width: 100%; height: 55%">
                    <div class="card-body">
                        <h5 class="card-title"><?=$mobil['model']?></h5>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><small class="text-muted"><?=$mobil['merek']?></small>
                            </li>
                            <li class="list-group-item"><small class="text-muted"><?=$mobil['tahun']?></small>
                            </li>
                            <li class="list-group-item"><small class="text-muted"><?=$mobil['nopol']?></small>
                            </li>
                        </ul>
                        <div class="" style="display: flex; gap: 0.5rem; flex-direction: row-reverse;">
                            <form action="<?=BASEURL?>/Pelanggan/pageLihat" method="post">
                                <button type="submit" value="<?=$mobil['id_mobil']?>" name="id_mobil" class="btn btn-outline-info">Lihat</button>
                            </form>
                            <form action="<?=BASEURL?>/Pelanggan/pageRental" method="post">
                                <button type="submit" value="<?=$mobil['id_mobil']?>" name="id_mobil" class="btn btn-outline-warning">Rental</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
		<?php endforeach; ?>
    </div>
</div>