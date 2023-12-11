<div class="container mt-5">
    <div class="row row-cols-1 row-cols-md-auto g-4">
		<?php foreach ($data['mobil'] as $mobil) :?>
            <div class="col">
                <form action="<?=BASEURL?>/Pelanggan/module" method="post">
                    <div class="card" style="height: auto; width: 18rem">
                        <img src="<?=BASEURL?>/img/<?=$mobil['model']?>.jpg" class="card-img-top" alt="" style="width: 100%; height: 55%">
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
                            <input type="hidden" name="mobil" value="<?=$mobil['id_mobil']?>">
                            <div class="card-body text-end">
                                <button type="submit" value="lihat" name="page" class="btn btn-outline-info">Lihat</button>
                            </div>
                            <div class="card-body text-end">
                                <button type="submit" value="rental" name="page" class="btn btn-outline-warning" >Rental</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
		<?php endforeach; ?>
    </div>
</div>