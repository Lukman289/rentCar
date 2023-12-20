<div class="container mt-5">
    <h2>Edit Data Karyawan</h2>
    <form action="<?=BASEURL?>/Admin/editUser" method="POST">
	    <?php $kry = $data['karyawan']; ?>
            <div class="row">
                <!-- Kolom untuk data diri -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="<?=$kry['nama']?>" required>
                    </div>
                    <div class="form-group">
                        <label for="jabatan">No Telp</label>
                        <input type="number" class="form-control" id="jabatan" name="no_telp" value="<?=$kry['no_telp']?>" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?=$kry['email']?>" required>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input class="form-control" id="alamat" name="alamat" rows="3" value="<?=$kry['alamat']?>" required>
                    </div>
                </div>

                <!-- Kolom untuk username dan password -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username" value="<?=$kry['username']?>" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password">
                    </div>
                </div>
            </div>
            <div style="display: flex; gap: 0.5rem; flex-direction: row-reverse">
                <input type="hidden" name="userLevel" value="admin">
                <input type="hidden" name="user" value="karyawan">
                <input type="hidden" name="condition" value="<?=$kry['user_id']?>">
                <input type="hidden" name="conditionFk" value="<?=$kry['user_id']?>">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="<?=BASEURL?>/Admin/pageKaryawan" class="btn btn-danger">Batal</a>
            </div>
    </form>
</div>