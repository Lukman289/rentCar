<div class="container mt-5">
    <table class="table">
	    <?php if (isset($_SESSION['flashMessage']['pemesanan'])) {
		    echo $_SESSION['flashMessage']['pemesanan'];
		    unset($_SESSION['flashMessage']['pemesanan']);
	    } ?>
        <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Pelanggan</th>
            <th scope="col">Mobil</th>
            <th scope="col">Tanggal Peminjaman</th>
            <th scope="col">Tanggal Pengembalian</th>
            <th scope="col">Jumlah Pebayaran</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody class="table-group-divider">
            <?php $id = 1;
            foreach ($data['pemesanan'] AS $pmsn): ?>
        <tr>
            <th scope="row"><?=$id?></th>
            <td><?=$pmsn['nama']?></td>
            <td><?=$pmsn['model']?></td>
            <td><?=$pmsn['tanggal_pemesanan']?></td>
            <td><?=$pmsn['tanggal_pengembalian']?></td>
            <td><?= number_format($pmsn['jumlah_pembayaran'], 0 ,',', '.')?></td>
            <td>
                <div class="button-UD d-flex" style="gap: 8px">
                    <form action="<?= BASEURL ?>/Admin/deleteUser" method="post" onsubmit="return confirm('Lanjutkan Hapus Pemesanan?');">
                        <input type="hidden" name="user" value="pemesanan">
                        <input type="hidden" name="idName" value="id_pemesanan">
                        <button type="submit" class="btn btn-danger"
                                name="idData" value="<?= $pmsn['id_pemesanan']?>">DELETE
                        </button>
                    </form>
                </div>
            </td>
        </tr>
            <?php $id++; endforeach; ?>
        </tbody>
    </table>
</div>