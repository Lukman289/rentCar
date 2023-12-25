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
		</tr>
		</thead>
		<tbody class="table-group-divider">
		<?php $id = 1;
		foreach ($data['pesanan'] AS $pmsn): ?>
			<tr>
				<th scope="row"><?=$id?></th>
				<td><?=$pmsn['nama']?></td>
				<td><?=$pmsn['model']?></td>
				<td><?=$pmsn['tanggal_pemesanan']?></td>
				<td><?=$pmsn['tanggal_pengembalian']?></td>
				<td><?= number_format($pmsn['jumlah_pembayaran'], 0 ,',', '.')?></td>
			</tr>
			<?php $id++; endforeach; ?>
		</tbody>
	</table>
</div>