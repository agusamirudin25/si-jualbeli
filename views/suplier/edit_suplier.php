<?php

$id_suplier = $_GET['id_suplier'];
$suplier->detail_suplier($id_suplier);

if (isset($_POST['simpan'])) {
  $nama_suplier = trim(ucwords($_POST['nama_suplier']));
  $no_tlp = trim(ucwords($_POST['no_tlp']));
  $alamat = trim(ucwords($_POST['alamat']));

  $error = array();
  if (isset($error)) {
    foreach ($error as $key => $values) {
      echo $values; //tampilkan semua error
    }
  }

  if (count($error) == 0) //jika tidak ada error
  {
    $suplier->edit_suplier($id_suplier, $nama_suplier, $no_tlp, $alamat); //edit data
    $suplier->detail_suplier($id_suplier);
  }
}
?>

<div class="col-lg-12" style="font-family:Arial">
  <div class="card">
    <div class="card-body">
      <div class="box-body">
        <h3 class="page-header">
          <center>EDIT DATA SUPLIER
            <hr>
        </h3>
        </center>
        <form action="" method="post" class="form-horizontal">
          <div class="form-group row">
            <label class="col-sm-3 control-label" style="text-align:right">Id suplier</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" name="id_suplier" value="<?php echo $id_suplier ?>" id_suplier="" readonly>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-3 control-label" style="text-align:right">Nama Suplier</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" name="nama_suplier" value="<?php echo $suplier->nama_suplier; ?>" id_suplier="" required>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-3 control-label" style="text-align:right">No Telepon</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" name="no_tlp" value="<?php echo $suplier->no_tlp; ?>" id_suplier="" onkeypress="return isNumberKeyTrue(event)">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-3 control-label" style="text-align:right">Alamat</label>
            <div class="col-sm-6">
              <textarea class="form-control" name="alamat" id_suplier=""><?php echo $suplier->alamat; ?></textarea>
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
      </div>
    </div>
  </div>
</div>
</form>
