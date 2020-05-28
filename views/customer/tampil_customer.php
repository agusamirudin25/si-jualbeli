<div class="col-lg-12" style="font-family:Arial">
	<div class="card">
		<div class="card-body">
			<div class="box-body">
				<div class="text-center">
					<h3 class="page-header">
						DATA CUSTOMER
					</h3>
					<hr>
				</div>
				<p><a href="?p=tambah_customer"><button class="btn btn-sm btn-info"><span class="fa fa-pencil"></span> Tambah Customer</button></a></p><br>
				<table id="dataTable" class="table table-sm table-striped">
					<thead class="thead-light">
						<tr>
							<th>No.</th>
							<th>Id Customer</th>
							<th>Nama Customer</th>
							<th>No Telepon</th>
							<th>Alamat</th>
							<th style="text-align:center">Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php
						if ($customer->tampil_customer() != FALSE) {
							$no = 1;
							foreach ($customer->tampil_customer() as $data_customer) {
								?>
								<tr>
									<td><?php echo $no; ?></td>
									<td><?php echo $data_customer['id_customer']; ?></td>
									<td><?php echo $data_customer['nama_customer']; ?></td>
									<td><?php echo $data_customer['no_tlp']; ?></td>
									<td><?php echo $data_customer['alamat']; ?></td>

									<td style="text-align:center">
										<a href="?p=edit_customer&id_customer=<?php echo $data_customer['id_customer']; ?>"><button class="btn btn-sm btn-success btn-custom"><span class="fa fa-edit"></span></button></a>
										<a href="?p=hapus_customer&id_customer=<?php echo $data_customer['id_customer']; ?>"><button class="btn btn-sm btn-danger btn-custom" onClick="return confirm('Yakin Akan Menghapus Data?');"><span class="fa fa-trash-o"></span></button></a></td>
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
