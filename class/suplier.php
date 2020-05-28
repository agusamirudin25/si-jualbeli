<?php
class suplier
{
    public function tampil_suplier()
    {
        $koneksi = new koneksi;
        $query = mysqli_query($koneksi->conn, "SELECT * FROM suplier");
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
        $query = mysqli_query($koneksi->conn, "SELECT max(id_suplier) FROM suplier");
        $row = mysqli_fetch_array($query);
        if ($row) {
            $nilai_kode = substr($row[0], 3);
            $id_suplier = (int) $nilai_kode;
            $id_suplier = $id_suplier + 1;
            $id_suplier_otomatis = "SPL" . str_pad($id_suplier, 3, "0", STR_PAD_LEFT);
        } else {
            $id_suplier_otomatis = "SPL001";
        }
        return $id_suplier_otomatis;
    }

    public function simpan_suplier($id_suplier, $nama_suplier, $no_tlp, $alamat)
    {
        $koneksi = new koneksi;
        $cek = mysqli_query($koneksi->conn, "SELECT * FROM suplier WHERE id_suplier = '$id_suplier'");
        if (mysqli_num_rows($cek) == 0) {
            $query = mysqli_query($koneksi->conn, "INSERT INTO suplier VALUES ('$id_suplier','$nama_suplier','$no_tlp','$alamat')");
            if ($query) {
                echo "<div class='alert alert-success'><span class='fa fa-check'></span> Data suplier berhasil disimpan</div>";
            }
        }
    }
    public function hapus_suplier($id_suplier)
    {
        $koneksi = new koneksi;
        $query = mysqli_query($koneksi->conn, "DELETE FROM suplier WHERE id_suplier = '$id_suplier'");
        if ($query) {
            echo "<div class='alert alert-success'><span class='fa fa-check'></span> Data suplier dengan id " . $id_suplier . " berhasil dihapus</div>";
        }
    }

    public function edit_suplier($id_suplier, $nama_suplier, $no_tlp, $alamat)
    {
        $koneksi = new koneksi;
        $query = mysqli_query($koneksi->conn, "UPDATE suplier SET nama_suplier = '$nama_suplier', no_tlp ='$no_tlp', alamat='$alamat' WHERE id_suplier = '$id_suplier'");
        if ($query) {
            echo "<div class='alert alert-success'><span class='fa fa-check'></span> Data suplier berhasil diperbarui</div>";
        }
    }

    public function detail_suplier($id_suplier)
    {
        $koneksi = new koneksi;
        $query = mysqli_query($koneksi->conn, "SELECT * FROM suplier WHERE id_suplier = '$id_suplier'");
        $row = mysqli_fetch_array($query);
        $this->nama_suplier = $row['nama_suplier'];
        $this->no_tlp = $row['no_tlp'];
        $this->alamat = $row['alamat'];
    }
    
    

}
