<div class="container mt-5">
	<div class="card mb-2">
		<div class="row gx-5">
			<?php foreach ($data['mobil'] AS $mobil): ?>
            <div class="col-md-6">
                <img src="<?=BASEURL?>/img/<?=$mobil['model']?>.jpg" class="img-fluid rounded-start" alt="">
            </div>
            <div class="col-md-6">
                <div class="card-body">
                    <h2 class="card-title"><?=$mobil['model']?></h2>
                </div>
<!--                <ul class="list-group list-group-flush">-->
                <form action="">
                    <div>
                        <label for="nopol" class="form-label">Nomor Polisi
                            <input type="text" name="nopol" class="form-control"
                                   value="<?=$mobil['nopol']?>" required>
                        </label>
                    </div>
                    <div>
                        <label for="warna" class="form-label">Warna
                            <input type="text" name="warna" class="form-control"
                                   value="<?=$mobil['warna']?>" required>
                        </label>
                    </div>
                    <div>
                        <label for="harga" class="form-label">Harga Sewa
                            <input type="number" step="any" min="0" name="harga" class="form-control"
                                   value="<?=$mobil['harga']?>" required>
                        </label>
                    </div>
                    <div>
                        <label for="inlineRadio" class="form-label">Status
                            <br>
                            <label class="form-check form-check-inline">
                                <input type="radio" class="form-check-input" name="status" value="L" required>
                                <label for="inlineRadio1" class="form-check-label">Tersedia</label>
                            </label>
                            <label class="form-check form-check-inline">
                                <input type="radio" class="form-check-input" name="status" value="P">
                                <label for="inlineRadio2" class="form-check-label">Tidak Tersedia</label>
                            </label>
                        </label>
                    </div>
				<div class="card-body text-end">
                    <button type="submit" class="btn btn-primary">Submit</button>
					<button type="submit" class="btn btn-danger" value="..">Cancel</button>
				</div>
                </form>
                <?php endforeach;?>
			</div>
		</div>
	</div>



