<div class="container mt-5">
	<div class="card mb-3">
		<div class="row g-0">
			<?php $mobil = $data['mobil']; ?>
			<div class="col-md-4">
				<img src="<?=BASEURL?>/img/<?=$mobil['model']?>.jpg" class="img-fluid rounded-start" alt="">
			</div>
			<div class="col-md-8">
				<div class="card-body">
					<h2 class="card-title"><?=$mobil['model']?></h2>
				</div>
				<ul class="list-group list-group-flush">
					<li class="list-group-item"><small class="text-muted">Merek
							: <?=$mobil['merek']?></small></li>
					<li class="list-group-item"><small class="text-muted">Model
							: <?=$mobil['model']?></small></li>
					<li class="list-group-item"><small class="text-muted">Tahun
							: <?=$mobil['tahun']?></small></li>
                    <li class="list-group-item"><small class="text-muted">Harga
							: Rp.<?=$mobil['harga_sewa']?></small></li>
				</ul>
				<div class="card-body text-end">
					<a href="<?=BASEURL?>" class="btn btn-primary"">Kembali</a>
				</div>
			</div>
		</div>
	</div>



