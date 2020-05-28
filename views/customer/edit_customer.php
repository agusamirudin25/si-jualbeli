<?php

$id_customer = $_GET['id_customer'];
$customer->detail_customer($id_customer);

if (isset($_POST['simpan'])) {
  $nama_customer = trim(ucwords($_POST['nama_customer']));
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
    $customer->edit_customer($id_customer, $nama_customer, $no_tlp, $alamat); //edit data
    $customer->detail_customer($id_customer);
  }
}
?>

<div class="col-lg-12" style="font-family:Arial">
  <div class="card">
    <div class="card-body">
      <div class="box-body">
        <h3 class="page-header">
          <center>EDIT DATA CUSTOMER
            <hr>
        </h3>
        </center>
        <form action="" method="post" class="form-horizontal">
          <div class="form-group row">
            <label class="col-sm-3 control-label" style="text-align:right">Id Customer</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" name="id_customer" value="<?php echo $id_customer ?>" id_customer="" readonly>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-3 control-label" style="text-align:right">Nama Customer</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" name="nama_customer" value="<?php echo $customer->nama_customer; ?>" id_customer="" required>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-3 control-label" style="text-align:right">No Telepon</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" name="no_tlp" value="<?php echo $customer->no_tlp; ?>" id_customer="" onkeypress="return isNumberKeyTrue(event)">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-3 control-label" style="text-align:right">Alamat</label>
            <div class="col-sm-6">
              <textarea class="form-control" name="alamat" id_customer=""><?php echo $customer->alamat; ?></textarea>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-3 control-label"></label>
            <div class="col-sm-6">
              <button type="submit" name="simpan" class="btn btn-sm btn-success btn-custom"><span class="fa fa-save"></span> Simpan</button>
              <button type="reset" class="btn btn-sm btn-danger btn-custom"><span class="fa fa-refresh"></span> Batal</button>
              <a href="index.php?p=customer" class="btn btn-sm btn-secondary btn-custom"><span class="fa fa-reply-all"></span> Kembali</a>
            </div>
          </div>
      </div>
    </div>
  </div>
</div>
</form>
