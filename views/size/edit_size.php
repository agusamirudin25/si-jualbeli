<?php

$id_size = $_GET['id_size'];
$size->detail_size($id_size);

if (isset($_POST['simpan'])) {
  $size_karton = trim(ucwords($_POST['size_karton']));
  $satuan = trim(ucwords($_POST['satuan']));
  $harga = trim(ucwords($_POST['harga']));

  $error = array();
  if (isset($error)) {
    foreach ($error as $key => $values) {
      echo $values; //tampilkan semua error
    }
  }

  if (count($error) == 0) //jika tidak ada error
  {
    $size->edit_size($id_size, $size_karton, $satuan, $harga); //edit data
    $size->detail_size($id_size);
  }
}
?>

<div class="col-lg-12" style="font-family:Arial">
  <div class="card">
    <div class="card-body">
      <div class="box-body">
        <h3 class="page-header">
          <center>EDIT DATA SIZE
            <hr>
        </h3>
        </center>
        <form action="" method="post" class="form-horizontal">
          <div class="form-group row">
            <label class="col-sm-3 control-label" style="text-align:right">Id Size</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" name="id_size" value="<?php echo $id_size ?>" id_size="" readonly>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-3 control-label" style="text-align:right">Size Karton</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" name="size_karton" value="<?php echo $size->size_karton; ?>" id_size="" required>
            </div>
          </div>
           <div class="form-group row">
            <label class="col-sm-3 control-label" style="text-align:right">Satuan</label>
            <div class="col-sm-6">
              <select class="form-control" name="satuan" id="">
                <option value="Pcs" <?php if ($size->satuan == 'Pcs') {echo "selected";}?>>Pcs</option>
              </select>
            </div>
          </div>  
          <div class="form-group row">
            <label class="col-sm-3 control-label" style="text-align:right">Harga</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" name="harga" value="<?php echo $size->harga; ?>" id_size="" required>
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
      </div>
    </div>
  </div>
</div>
</form>
