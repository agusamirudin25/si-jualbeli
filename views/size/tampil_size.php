<div class="col-lg-12" style="font-family:Arial">
	<div class="card">
		<div class="card-body">
			<div class="box-body">
				<div class="text-center">
					<h3 class="page-header">
						DATA SIZE
					</h3>
					<hr>
				</div>
				<p><a href="?p=tambah_size"><button class="btn btn-sm btn-info"><span class="fa fa-pencil"></span> Tambah Size</button></a></p><br>
				<table id="dataTable" class="table table-sm table-striped">
					<thead class="thead-light">
						<tr>
							<th>No.</th>
							<th>Id Size</th>
							<th>Size Karton</th>
							<th>Satuan</th>
							<th>Harga</th>
							<th style="text-align:center">Aksi</th>
						</tr>
					</thead>
					<tbody>
						
						<?php
						error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
						if ($size->tampil_size() != FALSE) {
							$no = 1;
							foreach ($size->tampil_size() as $data_size) {
								?>
								<tr>
									<td><?php echo $no; ?></td>
									<td><?php echo $data_size['id_size']; ?></td>
									<td><?php echo $data_size['size_karton']; ?></td>
									<td><?php echo $data_size['satuan']; ?></td>
									<td><?php echo "Rp. " . number_format($data_size['harga']) . "" ?></td>

									<td style="text-align:center">
										<a href="?p=edit_size&id_size=<?php echo $data_size['id_size']; ?>"><button class="btn btn-sm btn-success btn-custom"><span class="fa fa-edit"></span></button></a>
										<a href="?p=hapus_size&id_size=<?php echo $data_size['id_size']; ?>"><button class="btn btn-sm btn-danger btn-custom" onClick="return confirm('Yakin Akan Menghapus Data?');"><span class="fa fa-trash-o"></span></button></a></td>
							<?php
									$no++;
								}
							}
							?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
