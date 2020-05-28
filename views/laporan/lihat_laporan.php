<?php
require_once 'library/tanggal.php';
?>
<div class="col-lg-12" style="font-family:Arial">
	<div class="card">
		<div class="card-body">
			<?php
			if ($_GET['p'] == 'cetak_laporan') { ?>
			<div class="container">
				<div class="row">
					<div class="col-md-2">
						<br><br>
						<img src="logo1.png" style="width: 250px;">
						<h6 style="padding-top: 10px;"></h6>
					</div>
					<div class="col col-lg-12 text-center align-bottom">
						<h2><b> CV SURYA BAJA MANDIRI </b></h2>
						<h6 style="padding-top: 5px;">
							<b>Metal & Components Machinery for Fabrication </b>
						</h6>
						<h6 style="padding-top: 10px;">
							Jalan Citarum Raya Krajan No.63 Kelurahan Adiarsa Barat <br>
							Kecamatan Karawang Barat Kabupaten Karawang Telp (0267) 409566
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
			<div class="box-body" id="body1">
				<h4 style="text-align:center"></h4><br>
				<form action="" method="post" class="form-inline" id="formLap">
					<div class="form-group" style="margin-left:10px">
						<label> Mulai Dari : &nbsp &nbsp</label>
						<!-- <select name="bulan" class="form-control" required>
							<option value="">--Bulan--</option>
							<option value="01">Januari</option>
							<option value="02">Februari</option>
							<option value="03">Maret</option>
							<option value="04">April</option>
							<option value="05">Mei</option>
							<option value="06">Juni</option>
							<option value="07">Juli</option>
							<option value="08">Agustus</option>
							<option value="09">September</option>
							<option value="10">Oktober</option>
							<option value="11">November</option>
							<option value="12">Desember</option>
						</select> -->
						<input type="date" name="dari" class="form-control">
					</div>
					<div class="form-group" style="margin-left:10px">
						<label> Sampai Dengan : &nbsp &nbsp</label>
						<!-- <select name="tahun" class="form-control" required>
							<option>--Tahun--</option>
							//<?php
								//for ($i = date('Y') - 2; $i <= date('Y') + 2; $i++) {
								?>
								<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
							<?php
							//}
							?>
						</select> -->
						<input type="date" name="sampai" class="form-control">
					</div>

					<div class="form-group" style="margin-left:10px">
						<button type="submit" name="cari" class="btn btn-primary"><span class="fa fa-eye"></span> Tampilkan</button>
					</div>
				</form>
				<br>
				<?php if (isset($_POST['cari']) || $_GET['p'] == 'cetak_laporan') {
					$dari = isset($_POST['dari']) ? $_POST['dari'] : $_GET['dari'];
					$sampai = isset($_POST['sampai']) ? $_POST['sampai'] : $_GET['sampai'];
					?>

				<h4 style="text-align:center"><b>LAPORAN PENJUALAN <br>Periode Tanggal <?php echo date('d-m-Y', strtotime($dari)) ?> Sampai Dengan <?php echo  date('d-m-Y', strtotime($sampai)) ?></h4></b><br>
				<div class="table-responsive">
					<table class="table table-bordered table-striped">
						<thead class="thead-light">
							<tr class="info">
								<th>No</th>
								<th>No Faktur</th>
								<th>No PO</th>
								<th>No Surat Jalan</th>
								<th>Nama Customer</th>
								<th>Tanggal</th>
								<th>Jumlah</th>
							</tr>
						</thead>
						<tbody>
							<?php
								require_once 'class/laporan.php';
								$laporan = new laporan;
								$laporan->lihat_laporan($dari, $sampai);
								?>
						</tbody>
					</table>
				</div>
				<?php } ?>
			</div>
			<?php
			if ($_GET['p'] == 'cetak_laporan') {
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