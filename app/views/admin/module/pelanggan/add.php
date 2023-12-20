<div class="container mt-5">
	<h2>Form Data Pelanggan</h2>
	<form action="<?=BASEURL?>/Admin/addUser" method="POST">
		<div class="row">
			<!-- Kolom untuk data diri -->
            <div class="col-md-6">
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama" required>
                </div>
                <div class="form-group">
                    <label for="no_telp">No Telp</label>
                    <input type="number" class="form-control" id="no_telp" name="no_telp" placeholder="Masukkan No_Telp"
                           required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan Email"
                           required>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat"
                           required>
                </div>
            </div>

			<!-- Kolom untuk username dan password -->
			<div class="col-md-6">
				<div class="form-group">
					<label for="username">Username</label>
					<input type="text" class="form-control" id="username" name="username"
					       placeholder="Masukkan Username" required>
				</div>
				<div class="form-group">
					<label for="password">Password</label>
					<input type="password" class="form-control" id="password" name="password"
					       placeholder="Masukkan Password" required>
				</div>
			</div>
		</div>
		<div style="display: flex; gap: 0.5rem; flex-direction: row-reverse">
            <input type="hidden" name="userLevel" value="pelanggan">
            <input type="hidden" name="user" value="pelanggan">
            <button type="submit" class="btn btn-primary">Simpan</button>
			<a href="<?=BASEURL?>/Admin/pagePelanggan" class="btn btn-danger">Batal</a>
		</div>
	</form>
</div>