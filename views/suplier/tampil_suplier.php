<div class="col-lg-12" style="font-family:Arial">
	<div class="card">
		<div class="card-body">
			<div class="box-body">
				<div class="text-center">
					<h3 class="page-header">
						DATA SUPLIER
					</h3>
					<hr>
				</div>
				<p><a href="?p=tambah_suplier"><button class="btn btn-sm btn-info"><span class="fa fa-pencil"></span> Tambah Suplier</button></a></p><br>
				<table id="dataTable" class="table table-sm table-striped">
					<thead class="thead-light">
						<tr>
							<th>No.</th>
							<th>Id Suplier</th>
							<th>Nama Suplier</th>
							<th>No Telepon</th>
							<th>Alamat</th>
							<th style="text-align:center">Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php
						if ($suplier->tampil_suplier() != FALSE) {
							$no = 1;
							foreach ($suplier->tampil_suplier() as $data_suplier) {
								?>
								<tr>
									<td><?php echo $no; ?></td>
									<td><?php echo $data_suplier['id_suplier']; ?></td>
									<td><?php echo $data_suplier['nama_suplier']; ?></td>
									<td><?php echo $data_suplier['no_tlp']; ?></td>
									<td><?php echo $data_suplier['alamat']; ?></td>

									<td style="text-align:center">
										<a href="?p=edit_suplier&id_suplier=<?php echo $data_suplier['id_suplier']; ?>"><button class="btn btn-sm btn-success btn-custom"><span class="fa fa-edit"></span></button></a>
										<a href="?p=hapus_suplier&id_suplier=<?php echo $data_suplier['id_suplier']; ?>"><button class="btn btn-sm btn-danger btn-custom" onClick="return confirm('Yakin Akan Menghapus Data?');"><span class="fa fa-trash-o"></span></button></a></td>
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
