<?php
if (isset($_POST['simpan'])) {
  $id_suplier = trim($_POST['id_suplier']);
  $nama_suplier = trim(ucwords($_POST['nama_suplier']));
  $no_tlp = trim(ucwords($_POST['no_tlp']));
  $alamat = trim(ucwords($_POST['alamat']));

  $error = array();
  if (empty($nama_suplier)) {
    $error['nama_suplier'] = 'Nama suplier Harus Diisi !<br>';
  }
  if (empty($no_tlp)) {
    $error['no_tlp'] = ' No Telepon Harus Diisi !<br>';
  }
  if (empty($alamat)) {
    $error['alamat'] = 'Alamat Harus Diisi !';
  }
  if (isset($error)) {
    foreach ($error as $key => $values) {
      echo $values; //tampilkan semua error
    }
  }
  if (count($error) == 0) //jika tidak ada error
  {
    $suplier->simpan_suplier($id_suplier, $nama_suplier, $no_tlp, $alamat); //simpan data
  }
}
?>
<?php
$kode = $suplier->id_terakhir();
?>

<div class="col-lg-12" style="font-family:Arial">
  <div class="card">
    <div class="card-body">
      <div class="box-body">
        <h3 class="page-header">
          <center>TAMBAH DATA SUPLIER
            <hr>
        </h3>
        </center>
        <form action="" method="post" class="form-horizontal">
          <div class="form-group row">
            <label class="col-sm-3 control-label" style="text-align:right">Id Suplier</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" name="id_suplier" value="<?php echo $kode ?>" readonly>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-3 control-label" style="text-align:right">Nama Suplier</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" name="nama_suplier" id="">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-3 control-label" style="text-align:right">No Telepon</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" name="no_tlp" id="" onkeypress="return isNumberKeyTrue(event)">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-3 control-label" style="text-align:right">Alamat</label>
            <div class="col-sm-6">
              <textarea class="form-control" name="alamat" id=""></textarea>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-3 control-label"></label>
            <div class="col-sm-6">
              <button type="submit" name="simpan" class="btn btn-sm btn-success btn-custom"><span class="fa fa-save"></span> Simpan</button>
              <button type="reset" class="btn btn-sm btn-danger btn-custom"><span class="fa fa-refresh"></span> Batal</button>
              <a href="index.php?p=suplier" class="btn btn-sm btn-secondary btn-custom"><span class="fa fa-reply-all"></span> Kembali</a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
