<?php
$no_faktur = $_GET['no_faktur'];
require_once 'library/tanggal.php';
?>
<div class="col-lg-12" style="font-family:Arial">
	<div class="card">
		<div class="card-body">
			<?php
			if ($_GET['p'] == 'cetak_detail') { ?>
				<div class="container">
					<div class="row">
						<div class="col-md-2">
							<img src="images/epc.jpg">
							<h6 style="padding-top: 10px;"></h6>
						</div>
						<div class="col col-lg-12 text-center align-bottom">
							<h2><b> PT. EMPAT PERDANA CARTON </b></h2>
							<h6 style="padding-top: 10px;">
								Jalan Rangga Gede No.147, Gempol <br>
								Kecamatan Karawang Barat Kabupaten Karawang Telp (0267) 401732 Fax (0267) 403310
							</h6>
						</div>
						<div class="col col-sm-1"></div>
					</div>
				</div>

				<hr style=" border: 2px solid black; margin: 4px 0px;">
				<hr style=" border: 2px solid black; margin: 4px 0px;"><br>
			<?php
			}
			?>
			<div class="box-body">
				<div class="text-center">
					<h3 class="page-header">
						FAKTUR
					</h3>
					<hr>
				</div>
				<?php
				$query = mysqli_query($koneksi->conn, "SELECT a.no_faktur, a.id_penjualan, a.id_customer, a.id_size, a.jml_hrg, a.tanggal_bayar, b.nama_customer FROM faktur a JOIN customer b ON a.id_customer = b.id_customer WHERE a.no_faktur='$no_faktur'");
				$data1 = mysqli_fetch_assoc($query);
				?>
				<div class="row">
					<div class="col">
						<div class="row">
							<div class="col">
								<label class="control-label" style="text-align:center">No Faktur </label>
							</div>
							<div class="col">
								<label>: <?php echo $data1['no_faktur']; ?></label>
							</div>
						</div>
						<div class="row">
							<div class="col">
								<label class="control-label" style="text-align:center">Id Customer </label>
							</div>
							<div class="col">
								<label>: <?php echo $data1['id_customer']; ?></label>
							</div>
						</div>
						<div class="row">
							<div class="col">
								<label class="control-label" style="text-align:center">Nama Customer </label>
							</div>
							<div class="col">
								<label>: <?php echo $data1['nama_customer']; ?></label>
							</div>
						</div>
					</div>
					<div class="col">
						<div class="row">
							<div class="col">
								<label class="control-label" style="text-align:center">Id Penjualan :</label>
							</div>
							<div class="col">
								<label>: <?php echo $data1['id_penjualan']; ?></label>
							</div>
						</div>
						<div class="row">
							<div class="col">
								<label class="control-label" style="text-align:center">Jatuh Tempo :</label>
							</div>
							<div class="col">
								<label>: <?php echo tanggal($data1['tanggal_bayar']); ?></label>
							</div>
						</div>
					</div>
				</div>
				<table class="table table-bordered table-striped text-center">
					<thead class="thead-dark">
						<tr>
							<th>No</th>
							<th>No Faktur</th>
							<th>Id Penjualan</th>
							<th>Id Customer</th>
							<th>Id Size</th>
							<th>Harga</th>
						</tr>
					</thead>
					<tbody>
						<?php
						echo $faktur->detail_faktur($data1['no_faktur']);
						?>
					</tbody>
				</table>
				<div class="text-center" id="tombol">
					<a href="index.php?p=faktur" class="btn btn-sm btn-danger" id="btn-nota1">
						<span class="fa fa-angle-double-left"></span> Kembali
					</a>
					<a id="btn-nota2" class="btn btn-sm btn-info" href="index.php?p=cetak_detail&no_faktur=<?php echo $_GET['no_faktur']; ?> " target="_blank">
						<span class="fa fa-print"></span> Cetak
					</a>
				</div>
				<?php
				if ($_GET['p'] == 'cetak_detail') {
				?>
					<div class="container"><br><br><br>
						<div class="row">
							<div class="col"></div>
							<div class="col"></div>
							<div class="col text-center">
								<div class="row">
									<div class="col">
										<b>
											Karawang <?= tanggal(date('Y-m-d')); ?> <br>
											<?= $_SESSION['level']; ?>
										</b>
									</div>
								</div>
								<br><br><br><br><br>
								<div class="row">
									<div class="col">
										<b><?= $_SESSION['nama_user']; ?></b>
									</div>
								</div>
							</div>
						</div>
					</div>
					<br>
				<?php
				}
				?>
			</div>
		</div>
	</div>
</div>