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
    foreach ($data['karyawan'] AS $kry): ?>
    <tr>
        <th scope="row"><?=$id?></th>
        <td><?=$kry['nama']?></td>
        <td><?=$kry['no_telp']?></td>
        <td><?=$kry['alamat']?></td>
        <td><?=$kry['email']?></td>
        <td>
            <div class="button-UD d-flex" style="gap: 8px">
                <form action="<?= BASEURL ?>/Admin/pageEditKaryawan" method="POST">
                    <button type="submit" name="id_karyawan" value="<?= $kry['id_karyawan'] ?>"
                            class="btn btn-primary">EDIT
                    </button>
                </form>
                <form action="<?= BASEURL ?>/Admin/deleteKaryawan" method="post">
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