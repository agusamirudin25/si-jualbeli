<div class="col-lg-12" style="font-family:Arial">
	<div class="card">
		<div class="card-body">
			<div class="box-body">
				<div class="text-center">
					<h3 class="page-header">
						DATA PEMBELIAN
					</h3>
					<hr>
				</div>
				<p><a href="?p=tambah_pembelian"><button class="btn btn-sm btn-info"><span class="fa fa-calculator"></span> Input Pembelian</button></a></p><br>
				<table id="dataTable" class="table table-sm table-striped">
					<thead class="thead-light">
						<tr>
							<th>No.</th>
							<th>Id Pembelian</th>
							<th>Id Suplier</th>
							<th>Deskripsi</th>
							<th>Id Size</th>
							<th>Harga</th>
							<th>Qty</th>
							<th>Jumlah Harga</th>
							<th>Tanggal Beli</th>
							<th>Jatuh Tempo</th>
							<th>Keterangan</th>
							<th>Bukti</th>
							<th style="text-align:center">Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php
						if ($pembelian->tampil_pembelian() != FALSE) {
							$no = 1;
							foreach ($pembelian->tampil_pembelian() as $data_pembelian) {
						?>
								<tr>
									<td><?php echo $no; ?></td>
									<td><?php echo $data_pembelian['id_pembelian']; ?></td>
									<td><?php echo $data_pembelian['id_suplier']; ?></td>
									<td><?php echo $data_pembelian['deskripsi']; ?></td>
									<td><?php echo $data_pembelian['id_size']; ?></td>
									<td><?php echo "Rp. " . number_format($data_pembelian['harga']) . "" ?></td>
									<td><?php echo $data_pembelian['qty']; ?></td>
									<td><?php echo "Rp. " . number_format($data_pembelian['jml_hrg']) . "" ?></td>
									<td><?php echo date('d-m-Y', strtotime($data_pembelian['tanggal_beli'])); ?></td>
									<td><?php echo date('d-m-Y', strtotime($data_pembelian['tanggal_bayar'])); ?></td>
									<td><?php echo $data_pembelian['keterangan']; ?></td>
									<td><?= $data_pembelian['bukti'] == 'default.png' ? "BELUM ADA" : "<img src=" . $data_pembelian['bukti'] . ">" ?> </td>

									<td style="text-align:center">
										<a href="?p=edit_pembelian&id_pembelian=<?php echo $data_pembelian['id_pembelian']; ?>"><button class="btn btn-sm btn-success btn-custom"><span class="fa fa-edit"></span></button></a>
										<a href="?p=hapus_pembelian&id_pembelian=<?php echo $data_pembelian['id_pembelian']; ?>"><button class="btn btn-sm btn-danger btn-custom" onClick="return confirm('Yakin Akan Menghapus Data?');"><span class="fa fa-trash-o"></span></button></a></td>

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
				<p><a href="?p=datapembelian"><button class="btn btn-lg btn-outline-primary"><span class="fa fa-print"></span> Cetak Pembelian</button></a></p><br>

				</table>
			</div>
		</div>
	</div>
</div>