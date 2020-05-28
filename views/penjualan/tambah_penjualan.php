<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
if (isset($_POST['simpan'])) {
  $id_penjualan = trim($_POST['id_penjualan']);
  $id_customer = trim(ucwords($_POST['id_customer']));
  $deskripsi = trim(ucwords($_POST['deskripsi']));
  $id_size = trim(ucwords($_POST['id_size']));
  $harga = trim(ucwords($_POST['harga']));
  $qty = trim(ucwords($_POST['qty']));
  $tanggal_jual = trim(ucwords($_POST['tanggal_jual']));
  $tanggal_bayar = trim(ucwords($_POST['tanggal_bayar']));
  $keterangan = trim(ucwords($_POST['keterangan']));

  $error = array();
  if (empty($id_customer)) {
    $error['id_customer'] = 'Id Customer Harus Diisi !<br>';
  }
  if (empty($deskripsi)) {
    $error['deskripsi'] = ' Deskripsi Harus Diisi !<br>';
  }
  if (empty($id_size)) {
    $error['id_size'] = 'Id Size Harus Diisi !<br>';
  }
  if (empty($qty)) {
    $error['qty'] = 'Qty Harus Diisi !<br>';
  }
  if (empty($tanggal_jual)) {
    $error['tanggal_jual'] = 'Tanggal Jual Harus Diisi !<br>';
  }
  if (empty($tanggal_bayar)) {
    $error['tanggal_bayar'] = 'Tanggal Jatuh Tempo Harus Diisi !<br>';
  }
  if (empty($keterangan)) {
    $error['keterangan'] = 'Keterangan Harus Diisi !<br>';
  }
  if (isset($error)) {
    foreach ($error as $key => $values) {
      echo $values; //tampilkan semua error
    }
  }
  if (count($error) == 0) //jika tidak ada error
  {
    $penjualan->simpan_penjualan($id_penjualan, $id_customer, $deskripsi, $id_size, $harga, $qty, $tanggal_jual, $tanggal_bayar, $keterangan); //simpan data
  }
}
?>
<?php
$kode = $penjualan->id_terakhir();
?>

<div class="col-lg-12" style="font-family:Arial">
  <div class="card">
    <div class="card-body">
      <div class="box-body">
        <h3 class="page-header">
          <center>TAMBAH DATA PENJUALAN
            <hr>
        </h3>
        </center>
        <form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
          <div class="form-group row">
            <label class="col-sm-3 control-label" style="text-align:right">Id Penjualan</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" name="id_penjualan" value="<?php echo $kode ?>" readonly>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-3 control-label" style="text-align:right">Id Customer</label>
            <div class="col-sm-6">
              <select name="id_customer" class="form-control" onchange="changeValue(this.value)">
                <option value=0>--Silahkan Pilih--</option>
                <?php
                $query = mysqli_query($koneksi->conn, "SELECT * FROM customer");
                while ($row = mysqli_fetch_array($query)) { ?>
                  <option value="<?php echo $row['id_customer']; ?>" <?php if ($id_customer == $row['id_customer']) {
                                                                        echo 'selected ';
                                                                      } ?>>
                    <?php echo $row['id_customer'] . " - " . $row['nama_customer']; ?>
                  </option>
                <?php
                }
                ?>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-3 control-label" style="text-align:right">Deskripsi</label>
            <div class="col-sm-6">
              <textarea class="form-control" name="deskripsi" id=""></textarea>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-3 control-label" style="text-align:right">Id Size</label>
            <div class="col-sm-6">
              <select name="id_size" id="id_size" class="form-control" onchange="changeValue(this.value)">
                <option value=0>--Silahkan Pilih--</option>

                <?php
                $query = mysqli_query($koneksi->conn, "SELECT * FROM size");

                $jsArray = "var dtsize = new Array();\n";
                while ($row = mysqli_fetch_array($query)) {  ?>
                  <option value="<?php echo $row['id_size']; ?>" <?php if ($id_size == $row['id_size']) {
                                                                    echo 'selected ';
                                                                  } ?>>
                  <?php echo $row['id_size'] . " - " . $row['size_karton'];
                  $jsArray .= "dtsize['" . $row['id_size'] . "'] = {harga:'" . addslashes($row['harga']) . "',satuan:'" . addslashes($row['satuan']) . "'};\n";
                }
                  ?>
              </select>

            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-3 control-label" style="text-align:right">Harga</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" name="harga" id="harga" readonly>
            </div>
          </div>

          <div class="form-group row">
            <label class="control-label col-sm-3" for="nama" style="text-align:right">Qty</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" name="qty" required>
            </div>
          </div>

          <div class="form-group row">
            <label class="control-label col-sm-3" for="nama" style="text-align:right">Tanggal Jual</label>
            <div class="col-sm-6">
              <input type="date" class="form-control" name="tanggal_jual" id="" value="<?php echo date('d-m-Y'); ?>">
            </div>
          </div>

          <div class="form-group row">
            <label class="control-label col-sm-3" for="nama" style="text-align:right">Jatuh Tempo</label>
            <div class="col-sm-6">
              <input type="date" class="form-control" name="tanggal_bayar" id="" value="<?php echo date('d-m-Y'); ?>">
            </div>
          </div>

          <div class="form-group row">
            <label class="control-label col-sm-3" for="nama" style="text-align:right">Keterangan</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" name="keterangan" required>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-3 control-label" style="text-align:right">Bukti</label>
            <div class="col-sm-6">
              <input type="file" name="bukti" id="bukti">
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-3 control-label"></label>
            <div class="col-sm-6">
              <button type="submit" name="simpan" class="btn btn-sm btn-success btn-custom"><span class="fa fa-save"></span> Simpan</button>
              <button type="reset" class="btn btn-sm btn-danger btn-custom"><span class="fa fa-refresh"></span> Batal</button>
              <a href="index.php?p=penjualan" class="btn btn-sm btn-secondary btn-custom"><span class="fa fa-reply-all"></span> Kembali</a>
            </div>
          </div>
        </form>
        <script type="text/javascript">
          <?php echo $jsArray; ?>

          function changeValue(id_size) {
            document.getElementById('harga').value = dtsize[id_size].harga;
            document.getElementById('satuan').value = dtsize[id_size].satuan;
          };
        </script>
      </div>
    </div>
  </div>
</div>