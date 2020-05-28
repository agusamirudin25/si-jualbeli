<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
if (isset($_POST['simpan'])) {
  $id_size= trim($_POST['id_size']);
  $size_karton = trim(ucwords($_POST['size_karton']));
  $satuan = trim(ucwords($_POST['satuan']));
  $harga = trim(ucwords($_POST['harga']));

  $error = array();
  if (empty($size_karton)) {
    $error['size_karton'] = 'Size Karton Harus Diisi !<br>';
  }
  if (empty($satuan)) {
    $error['satuan'] = 'Satuan Harus Diisi !<br>';
  }
  if (empty($harga)) {
    $error['harga'] = 'Harga Harus Diisi !<br>';
  }
  if (isset($error)) {
    foreach ($error as $key => $values) {
      echo $values; //tampilkan semua error
    }
  }
  if (count($error) == 0) //jika tidak ada error
  {
    $size->simpan_size($id_size, $size_karton, $satuan, $harga); //simpan data
  }
}
?>
<?php
$kode = $size->id_terakhir();
?>

<div class="col-lg-12" style="font-family:Arial">
  <div class="card">
    <div class="card-body">
      <div class="box-body">
        <h3 class="page-header">
          <center>TAMBAH DATA SIZE
            <hr>
        </h3>
        </center>
        <form action="" method="post" class="form-horizontal">
          <div class="form-group row">
            <label class="col-sm-3 control-label" style="text-align:right">Id Size</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" name="id_size" value="<?php echo $kode ?>" readonly>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-3 control-label" style="text-align:right">Size Karton</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" name="size_karton" id="">
            </div>
          </div>
          <div class="form-group row">
              <label class="col-sm-3 control-label" style="text-align:right">Satuan</label>
              <div class="col-sm-6">
                <select name="satuan" class="form-control">
                  <option value="Pcs">Pcs</option>
                </select>
              </div>
            </div>
          <div class="form-group row">
            <label class="col-sm-3 control-label" style="text-align:right">Harga</label>
            <div class="col-sm-6">
             <input type="text" class="form-control" name="harga" id="">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-3 control-label"></label>
            <div class="col-sm-6">
              <button type="submit" name="simpan" class="btn btn-sm btn-success btn-custom"><span class="fa fa-save"></span> Simpan</button>
              <button type="reset" class="btn btn-sm btn-danger btn-custom"><span class="fa fa-refresh"></span> Batal</button>
              <a href="index.php?p=size" class="btn btn-sm btn-secondary btn-custom"><span class="fa fa-reply-all"></span> Kembali</a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
