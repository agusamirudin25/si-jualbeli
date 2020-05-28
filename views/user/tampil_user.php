<div class="col-lg-12" style="font-family:Arial">
	<div class="card">
		<div class="card-body">
			<div class="box-body">
				<div class="text-center">
					<h3 class="page-header">DATA USER</h3>
					<hr>
				</div>
				<a href="?p=tambah_user">
					<button class="btn btn-sm btn-info"><span class="fa fa-pencil"></span> Tambah User</button>
				</a><br><br>
				<table id="dataTable" class="table table-sm table-striped">
					<thead class="thead-light">
						<tr>
							<th>No</th>
							<th>Id User</th>
							<th>Nama User</th>
							<th>No Telepon</th>
							<th>Level</th>
							<th style="text-align:center">Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php
						if ($user->tampil_user() != false) {
							$no = 1;
							foreach ($user->tampil_user() as $data_user) {
								?>
								<tr>
									<td><?php echo $no; ?></td>
									<td><?php echo $data_user['id_user']; ?></td>
									<td><?php echo $data_user['nama_user']; ?></td>
									<td><?php echo $data_user['no_tlp']; ?></td>
									<td><?php echo $data_user['level']; ?></td>
									<td style="text-align:center">
										<a href="?p=edit_user&id_user=<?php echo $data_user['id_user']; ?>">
											<button class="btn btn-sm btn-success btn-custom">
												<span class="fa fa-edit"></span>
											</button>
										</a>
										<a href="?p=hapus_user&id_user=<?php echo $data_user['id_user']; ?>">
											<button class="btn btn-sm btn-danger btn-custom" onClick="return confirm('Yakin Akan Menghapus Data?');">
												<span class="fa fa-trash-o"></span>
											</button>
										</a>
									</td>
								</tr>
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
