<?php
class user
{
  public function tampil_user()
  {
    $koneksi = new koneksi();
    $query = mysqli_query($koneksi->conn, "SELECT * FROM user");
    if (mysqli_num_rows($query) > 0) {
      while ($row = mysqli_fetch_array($query)) {
        $data[] = $row;
      }
      return $data;
    } else {
      return false;
    }
  }

  public function kode_terakhir()
  {
    $koneksi = new koneksi();
    $query = mysqli_query($koneksi->conn, "SELECT max(id_user) FROM user");
    $row = mysqli_fetch_array($query);
    if ($row) {
      $nilai_kode = substr($row[0], 3);
      $kode_user = (int) $nilai_kode;
      $kode_user = $kode_user + 1;
      $kode_user_otomatis = "USR" . str_pad($kode_user, 2, "0", STR_PAD_LEFT);
    } else {
      $kode_user_otomatis = "USR01";
    }
    return $kode_user_otomatis;
  }

  public function simpan_user($id_user, $nama_user, $no_tlp, $password, $level)
  {
    $koneksi = new koneksi();
    $cek = mysqli_query($koneksi->conn, "SELECT * FROM user WHERE id_user = '$id_user'");
    if (mysqli_num_rows($cek) == 0) {
      $query = mysqli_query($koneksi->conn, "INSERT INTO user VALUES ('$id_user','$nama_user','$no_tlp','$password', '$level')");
      if ($query) {
        echo "<div class='alert alert-success'><span class='fa fa-check'></span> Data user berhasil disimpan</div>";
      }
    }
  }
  public function hapus_user($id_user)
  {
    $koneksi = new koneksi();
    $query = mysqli_query($koneksi->conn, "DELETE FROM user WHERE id_user = '$id_user'");
    if ($query) {
      echo "<div class='alert alert-success'><span class='fa fa-check'></span> Data user dengan kode " . $id_user . " berhasil dihapus</div>";
    }
  }

  public function edit_user($id_user, $nama_user, $no_tlp, $level)
  {
    $koneksi = new koneksi();
    $query = mysqli_query($koneksi->conn, "UPDATE user SET nama_user = '$nama_user', no_tlp ='$no_tlp', level='$level' WHERE id_user = '$id_user'");
    if ($query) {
      echo "<div class='alert alert-success'><span class='fa fa-check'></span> Data user berhasil diperbarui</div>";
    }
  }

  public function detail_user($id_user)
  {
    $koneksi = new koneksi();
    $query = mysqli_query($koneksi->conn, "SELECT * FROM user WHERE id_user = '$id_user'");
    $row = mysqli_fetch_array($query);
    $this->nama_user = $row['nama_user'];
    $this->no_tlp = $row['no_tlp'];
    $this->level = $row['level'];
  }
}
