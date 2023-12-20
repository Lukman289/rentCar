<div class="container mt-5">
    <table class="table">
	    <?php if (isset($_SESSION['flashMessage']['pelanggan'])) {
		    echo $_SESSION['flashMessage']['pelanggan'];
		    unset($_SESSION['flashMessage']['pelanggan']);
	    } ?>
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
                        <form action="<?= BASEURL ?>/Admin/pageEditPelanggan" method="post">
                            <button type="submit" name="id_pelanggan" value="<?= $plg['id_pelanggan'] ?>"
                                    class="btn btn-primary">EDIT
                            </button>
                        </form>
                        <form action="<?= BASEURL ?>/Admin/deleteUser" method="post" onsubmit="return confirm('Lanjutkan Hapus Pelanggan?');">
                            <input type="hidden" name="user" value="pelanggan">
                            <input type="hidden" name="idName" value="id_pelanggan">
                            <button type="submit" class="btn btn-danger"
                                    name="idData" value="<?= $plg['id_pelanggan']?>">DELETE
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
			<?php $id++; endforeach; ?>
        </tbody>
    </table>
</div>