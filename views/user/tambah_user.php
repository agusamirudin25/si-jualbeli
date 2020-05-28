<?php
if (isset($_POST['simpan'])) {
  $id_user = trim($_POST['id_user']);
  $nama_user = trim(ucwords($_POST['nama_user']));
  $no_tlp = trim(ucwords($_POST['no_tlp']));
  $password = md5($_POST['password']);
  $level = trim(ucwords($_POST['level']));

  $error = array();
  if (empty($nama_user)) {
    $error['nama_user'] = 'Nama Harus Diisi !<br>';
  }
  if (empty($no_tlp)) {
    $error['no_tlp'] = 'No Telepon Harus Diisi !<br>';
  }
  if (empty($password)) {
    $error['password'] = 'Password Haus Diisi !<br>';
  }
  if (empty($level)) {
    $error['level'] = 'Level Harus Diisi !';
  }

  if (isset($error)) {
    foreach ($error as $key => $values) {
      echo $values; //tampilkan semua error
    }
  }
  if (count($error) == 0) //jika tidak ada error
  {
    $user->simpan_user($id_user, $nama_user, $no_tlp, $password, $level); //simpan data
  }
}
?>

<?php
$kode = $user->kode_terakhir();
?>
<div class="col-lg-12" style="font-family:Arial">
  <div class="card">
    <div class="card-body">
      <div class="box-body">
        <div class="text-center">
          <h3 class="page-header">
            TAMBAH DATA USER
          </h3>
          <hr>
        </div>
        <form action="index.php?p=tambah_user" method="post" class="form-horizontal">
          <div class="form-group row">
            <label class="col-sm-3 control-label" style="text-align:right">ID User</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" name="id_user" value="<?php echo $kode ?>" readonly>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-3 control-label" style="text-align:right">Nama User</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" name="nama_user" id="">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-3 control-label" style="text-align:right">No Telepon</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" name="no_tlp" id="" onkeypress="return isNumberKeyTrue(event)">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-3 control-label" style="text-align:right">Password</label>
            <div class="col-sm-6">
              <input type="password" class="form-control" name="password" id="">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-3 control-label" style="text-align:right">Level</label>
            <div class="col-sm-6">
              <select name="level" class="form-control">
                <option value="">--Silahkan Pilih--</option>
                <option value="admin">Admin</option>
                <option value="marketing">Marketing</option>
                <option value="pimpinan perusahaan">Pimpinan Perusahaan</option>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-3 control-label"></label>
            <div class="col-sm-6">
              <button type="submit" name="simpan" class="btn btn-sm btn-success btn-custom"><span class="fa fa-save"></span> Simpan</button>
              <button type="reset" class="btn btn-sm btn-danger btn-custom"><span class="fa fa-refresh"></span> Batal</button>
              <a href="index.php?p=user" class="btn btn-sm btn-secondary btn-custom"><span class="fa fa-reply-all"></span> Kembali</a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
