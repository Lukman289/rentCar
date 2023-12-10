<div class="container mt-5">
	<div class="card mb-3">
		<div class="row g-0">
            <?php foreach ($data['mobil'] AS $mobil): ?>
			<div class="col-md-4">
<<<<<<< HEAD
				<img src="<?=BASEURL?>/img/<?=$mobil['model']?>.jpg" class="img-fluid rounded-start" alt="">
=======
				<img src="<?=BASEURL?> /img/<?=$data['mobil']?>.jpg" class="img-fluid rounded-start" alt="">
>>>>>>> 9e918f254d3828d1a35fe840cf811da8c14cfa86
			</div>
			<div class="col-md-8">
				<div class="card-body">
					<h2 class="card-title"><?=$mobil['model']?></h2>
				</div>
				<ul class="list-group list-group-flush">
					<li class="list-group-item"><small class="text-muted">Merek
							: <?=$mobil['model']?></small></li>
					<li class="list-group-item"><small class="text-muted">Model
							: Contoh</small></li>
					<li class="list-group-item"><small class="text-muted">Tahun
							: 2021</small></li>
					<li class="list-group-item"><small
							class="text-muted">Deskripsi<br>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium animi corporis dolores et iure iusto
                            labore laboriosam laborum libero magnam molestias, nobis pariatur quos ratione sit veritatis voluptates. Eius, rem?</small></li>
				</ul>
				<div class="card-body text-end">
					<a href="<?=BASEURL?>" class="btn btn-primary"">Kembali</a>
				</div>
                <?php endforeach;; ?>
			</div>
		</div>
	</div>



