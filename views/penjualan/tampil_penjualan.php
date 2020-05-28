<div class="col-lg-12" style="font-family:Arial">
	<div class="card">
		<div class="card-body">
			<div class="box-body">
				<div class="text-center">
					<h3 class="page-header">
						DATA PENJUALAN
					</h3>
					<hr>
				</div>
				<p><a href="?p=tambah_penjualan"><button class="btn btn-sm btn-info"><span class="fa fa-calculator"></span> Input Penjualan</button></a></p><br>
				<table id="dataTable" class="table table-sm table-striped">
					<thead class="thead-light">
						<tr>
							<th>No.</th>
							<th>Id Penjualan</th>
							<th>Id Customer</th>
							<th>Deskripsi</th>
							<th>Id Size</th>
							<th>Harga</th>
							<th>Qty</th>
							<th>Jumlah Harga</th>
							<th>Tanggal Jual</th>
							<th>Jatuh Tempo</th>
							<th>Keterangan</th>
							<th>Bukti</th>
							<th style="text-align:center">Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php
						if ($penjualan->tampil_penjualan() != FALSE) {
							$no = 1;
							foreach ($penjualan->tampil_penjualan() as $data_penjualan) {
						?>
								<tr>
									<td><?php echo $no; ?></td>
									<td><?php echo $data_penjualan['id_penjualan']; ?></td>
									<td><?php echo $data_penjualan['id_customer']; ?></td>
									<td><?php echo $data_penjualan['deskripsi']; ?></td>
									<td><?php echo $data_penjualan['id_size']; ?></td>
									<td><?php echo "Rp. " . number_format($data_penjualan['harga']) . "" ?></td>
									<td><?php echo $data_penjualan['qty']; ?></td>
									<td><?php echo "Rp. " . number_format($data_penjualan['jml_hrg']) . "" ?></td>
									<td><?php echo date('d-m-Y', strtotime($data_penjualan['tanggal_jual'])); ?></td>
									<td><?php echo date('d-m-Y', strtotime($data_penjualan['tanggal_bayar'])); ?></td>
									<td><?php echo $data_penjualan['keterangan']; ?></td>
									<td><?= $data_penjualan['bukti'] == 'default.png' ? "BELUM ADA" : "<img src=" . $data_penjualan['bukti'] . ">" ?> </td>
									<td style="text-align:center">

										<a href="?p=edit_penjualan&id_penjualan=<?php echo $data_penjualan['id_penjualan']; ?>"><button class="btn btn-sm btn-success btn-custom"><span class="fa fa-edit"></span></button></a>
										<a href="?p=hapus_penjualan&id_penjualan=<?php echo $data_penjualan['id_penjualan']; ?>"><button class="btn btn-sm btn-danger btn-custom" onClick="return confirm('Yakin Akan Menghapus Data?');"><span class="fa fa-trash-o"></span></button></a></td>
							<?php

								$no++;
							}
						}
						//$total =$barang->total() 
							?>

					</tbody>
				</table>
				<br>
				</center>
				<p><a href="?p=datapenjualan"><button class="btn btn-lg btn-outline-primary"><span class="fa fa-print"></span> Cetak Penjualan</button></a></p><br>

			</div>
		</div>
	</div>
</div>