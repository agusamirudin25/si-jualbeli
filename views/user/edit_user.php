<?php

$id_user = $_GET['id_user'];
$user->detail_user($id_user);

if (isset($_POST['simpan'])) {
    $nama_user = trim(ucwords($_POST['nama_user']));
    $no_tlp = trim(ucwords($_POST['no_tlp']));
    $level = trim(ucwords($_POST['level']));

    $error = array();
    if (isset($error)) {
        foreach ($error as $key => $values) {
            echo $values; //tampilkan semua error
        }
    }

    if (count($error) == 0) //jika tidak ada error
    {
        $user->edit_user($id_user, $nama_user, $no_tlp, $level); //edit data
        $user->detail_user($id_user);
    }
}
?>

<div class="col-lg-12" style="font-family:Arial">
  <div class="card">
    <div class="card-body">
      <div class="box-body">
        <h3 class="page-header"><center>EDIT DATA USER<hr></h3></center>
        <form action="" method="post" class="form-horizontal">
          <div class="form-group row">
            <label class="col-sm-3 control-label" style="text-align:right">ID User</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" name="id_user" value="<?php echo $id_user ?>"  id_user="" readonly>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-3 control-label" style="text-align:right">Nama User</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" name="nama_user" value="<?php echo $user->nama_user; ?>" nama_user="" required>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-3 control-label" style="text-align:right">No Telepon</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" name="no_tlp" value="<?php echo $user->no_tlp; ?>" id_user="" onkeypress="return isNumberKeyTrue(event)">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-3 control-label" style="text-align:right">Level</label>
            <div class="col-sm-6">
              <select class="form-control" name="level" id="">
                <option value="admin" <?php if ($user->level == 'admin') {echo "selected";}?>>Admin</option>
                <option value="marketing" <?php if ($user->level == 'marketing') {echo "selected";}?>>Marketing</option>
                <option value="pimpinan perusahaan" <?php if ($user->level == 'pimpinan perusahaan') {echo "selected";}?>>Pimpinan Perusahaan</option>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-3 control-label"></label>
            <div class="col-sm-6">
              <button type="submit" name="simpan" class="btn btn-sm btn-success btn-custom"><span class="fa fa-save"> Simpan</button>
              <button type="reset" class="btn btn-sm btn-danger btn-custom"><span class="fa fa-refresh"></span> Batal</button>
              <a href="index.php?p=user" class="btn btn-sm btn-secondary btn-custom"><span class="fa fa-reply-all"> Kembali</a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
