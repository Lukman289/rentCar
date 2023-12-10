<div class="container mt-5">
    <div class="row row-cols-1 row-cols-md-auto g-4">
		<?php foreach ($data['mobil'] as $mobil) :?>
            <div class="col">
                <form action="<?=BASEURL?>/Mobil" method="post">
                    <div class="card" style="height: auto; width: 18rem">
<<<<<<< HEAD
                        <img src="<?=BASEURL?>/img/<?=$mobil['model']?>.jpg" class="card-img-top" alt="" style="width: 100%; height: 55%">
=======
                        <img src="<?=BASEURL?> /img/<?=$mobil?>.jpg" class="card-img-top" alt="" style="width: 100%; height: 55%">
>>>>>>> 9e918f254d3828d1a35fe840cf811da8c14cfa86
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
                            <div class="card-body text-end">
                                <button type="submit" value="<?=$mobil['id']?>" name="mobil" class="btn btn-outline-info">Lihat</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
		<?php endforeach; ?>
    </div>
</div>