<div class="container mx-auto">
    <div class="card" style="width: 18rem; margin: 5rem auto 5rem auto;">
        <form action="<?=BASEURL?>/Admin/addMobil" method="post" enctype="multipart/form-data">
			<div class="col-md-12">
                <div>
                    <label for="model" class="form-label">Model
                        <select name="id_model" class="form-select">
                            <option value="" selected>Pilih Model</option>
							<?php foreach ($data['model'] as $model): ?>
                                <option value="<?= $model['id_model'] ?>"><?= $model['merek'] ?>
                                    : <?= $model['model'] ?></option>
							<?php endforeach; ?>
                        </select>
                    </label>
                </div>
                <div>
                    <label for="tahun" class="form-label">Tahun
                        <input type="date" name="tahun" class="form-control"
                               value="" required>
                    </label>
                </div>
                <div>
                    <label for="nopol" class="form-label">Nopol
                        <input type="text" name="nopol" class="form-control"
                               value="" required>
                    </label>
                </div>
                <div>
                    <label for="warna" class="form-label">Warna
                        <input type="text" name="warna" class="form-control"
                               value="" required>
                    </label>
                </div>
                <div>
                    <label for="harga" class="form-label">Harga Sewa
                        <input type="number" step="any" min="0" name="harga" class="form-control"
                               value="" required>
                    </label>
                </div>
                <div>
                    <label for="image" class="form-label">Foto Kendaraan
                        <input type="file" name="img" accept=".jpeg, .jpg, .png" class="form-control">
                    </label>
                </div>
                <div>
                    <label for="inlineRadio" class="form-label">Status
                        <br>
                        <label class="form-check form-check-inline">
                            <input type="radio" class="form-check-input" name="status" value="tersedia" required checked>
                            <label for="inlineRadio1" class="form-check-label">Tersedia</label>
                        </label>
                        <label class="form-check form-check-inline">
                            <input type="radio" class="form-check-input" name="status" value="tidak tersedia">
                            <label for="inlineRadio2" class="form-check-label">Tidak Tersedia</label>
                        </label>
                    </label>
                </div>
				<div class="card-body text-end">
                    <input type="hidden" name="page" value="../index">
                    <input type="hidden" name="add" value= "1">
					<button type="submit" class="btn btn-success"">ADD</button>
				</div>
            </div>
        </form>
    </div>
</div>


