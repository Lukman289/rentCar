<div class="container mt-5">
    <form action="<?=BASEURL?>/Pelanggan/addRental" method="post">
        <div class="card mb-3">
            <div class="row g-0">
                <h3 class="card-title text-center">Rental Mobil</h3><br>
				<?php $mobil = $data['mobil'];
                    $plgn = $data['pelanggan']?>
                <div class="col-md-4">
                    <img src="<?=BASEURL?> /img/<?=$mobil['model']?>.jpg" class="img-fluid rounded-start" alt="">
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
                        <li class="list-group-item"><small class="text-muted">Harga Sewa
                                : <?=$mobil['harga_sewa']?></small></li>
                    </ul>
                    <div class="card-body col-10">
                        <div class="row">
                            <div class="col-md-5">
                                <label for="date">Tanggal Peminjaman: </label>
                                <input type="date" name="tgl_pemesanan" class="form-control">
                            </div>
                            <div class="col-md-5">
                                <label for="date">Tanggal Pengambalian: </label>
                                <input type="date" name="tgl_pengembalian" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="card-body text-end">
                        <a href="<?=BASEURL?>/Pelanggan/index" class="btn btn-danger">Kembali</a>
                        <input type="hidden" name="pelanggan_id" value="<?=$data['pelanggan']['id_pelanggan']?>">
                        <input type="hidden" name="jumlah_pembayaran" value="<?=$mobil['harga_sewa']?>">
                        <button type="submit" name="mobil_id" value="<?=$mobil['id_mobil']?>" class="btn btn-primary">Rental</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>