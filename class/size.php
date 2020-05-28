<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
class size
{
    public function tampil_size()
    {
        $koneksi = new koneksi;
        $query = mysqli_query($koneksi->conn, "SELECT id_size, size_karton, satuan, harga FROM `size`GROUP by id_size");
        if (mysqli_num_rows($query) > 0) {
            while ($row = mysqli_fetch_array($query)) {
                $data[] = $row;
            }
            return $data;
        }
    }
    
    public function id_terakhir()
    {
        $koneksi = new koneksi;
        $query = mysqli_query($koneksi->conn, "SELECT max(id_size) FROM size");
        $row = mysqli_fetch_array($query);
        if ($row) {
            $nilai_kode = substr($row[0], 2);
            $id_size = (int) $nilai_kode;
            $id_size = $id_size + 1;
            $id_size_otomatis = "SZ" . str_pad($id_size, 4, "0", STR_PAD_LEFT);
        } else {
            $id_size_otomatis = "SZ0001";
        }
        return $id_size_otomatis;
    }

    public function simpan_size($id_size, $size_karton, $satuan, $harga)
    {
        $koneksi = new koneksi;
        $cek = mysqli_query($koneksi->conn, "SELECT * FROM size WHERE id_size = '$id_size'");
        if (mysqli_num_rows($cek) == 0) {
            $query = mysqli_query($koneksi->conn, "INSERT INTO size VALUES ('$id_size','$size_karton', '$satuan', '$harga')");
            if ($query) {
                echo "<div class='alert alert-success'><span class='fa fa-check'></span> Data size berhasil disimpan</div>";
            }
        }
    }
    
    public function hapus_size($id_size)
    {
        $koneksi = new koneksi;
        $query = mysqli_query($koneksi->conn, "DELETE FROM size WHERE id_size = '$id_size'");
        if ($query) {
            echo "<div class='alert alert-success'><span class='fa fa-check'></span> Data size dengan id " . $id_size . " berhasil dihapus</div>";
        }
    }

    public function edit_size($id_size, $size_karton, $satuan, $harga)
    {
        $koneksi = new koneksi;
        $query = mysqli_query($koneksi->conn, "UPDATE size SET size_karton = '$size_karton', satuan='$satuan', harga='$harga' WHERE id_size = '$id_size'");
        if ($query) {
            echo "<div class='alert alert-success'><span class='fa fa-check'></span> Data size berhasil diperbarui</div>";
        }
    }

    public function detail_size($id_size)
    {
        $koneksi = new koneksi;
        $query = mysqli_query($koneksi->conn, "SELECT * FROM size WHERE id_size = '$id_size'");
        $row = mysqli_fetch_array($query);
        $this->size_karton = $row['size_karton'];
        $this->satuan = $row['satuan'];
        $this->harga = $row['harga'];
    }
}


