<div class="container mt-5" style="width: 750px">
	<div class="card">
		<div class="card-body">
			<h3 class="card-title text-center">Rental Mobil</h3><br>
			<form class="row">
				<div class="col-md-10 mb-3">
					<label for="validationDefault01" class="form-label">Nama</label>
					<input type="text" class="form-control" id="validationDefault01" placeholder="Nama" required>
				</div>
				<div class="col-md-10 mb-2">
					<label for="validationDefault03" class="form-label">Alamat</label>
					<input type="text" class="form-control" id="validationDefault03" placeholder="Alamat" required>
				</div>
				<div class="col-md-10 mb-2">
					<label for="validationDefault03" class="form-label">Email</label>
					<input type="text" class="form-control" id="validationDefault03" placeholder="Email" required>
				</div>
				<div class="col-md-10 mb-4">
					<label for="validationDefault03" class="form-label">No Telepon</label>
					<input type="number" class="form-control" id="validationDefault03" placeholder="08xxx" required>
				</div>
				<div class="col-12 text-end">
                    <a href="<?=BASEURL?>/Pelanggan/index" class="btn btn-danger">Kembali</a>
					<button class="btn btn-primary" type="submit">Submit form</button>
                </div>
			</form>
		</div>
	</div>
</div>