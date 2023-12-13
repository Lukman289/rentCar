<div class="container mt-5">
    <table class="table">
        <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Nama</th>
            <th scope="col">No Telp</th>
            <th scope="col">Alamat</th>
            <th scope="col">Email</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody class="table-group-divider">
		<?php $id = 1;
		foreach ($data['pelanggan'] AS $plg): ?>
            <tr>
                <th scope="row"><?=$id?></th>
                <td><?=$plg['nama']?></td>
                <td><?=$plg['no_telp']?></td>
                <td><?=$plg['alamat']?></td>
                <td><?=$plg['email']?></td>
                <td>
                    <div class="button-UD d-flex" style="gap: 8px">
                        <form action="<?= BASEURL ?>/Admin/pageEditPelanggan" method="POST">
                            <button type="submit" name="NIP" value="<?= $plg['id_pelanggan'] ?>"
                                    class="btn btn-primary">EDIT
                            </button>
                        </form>
                        <form action="<?= BASEURL ?>/Admin/deletePelanggan" method="post">
                            <button class="btn btn-danger"
                                    onclick="confirm('Hapus Data Dosen?');">DELETE
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
			<?php $id++; endforeach; ?>
        </tbody>
    </table>
</div>