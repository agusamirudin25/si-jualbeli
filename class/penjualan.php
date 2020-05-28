<?php
class penjualan
{
    public function tampil_penjualan()
    {
        $koneksi = new koneksi;
        $query = mysqli_query($koneksi->conn, "SELECT id_penjualan, id_customer, deskripsi, id_size, harga, qty, 
        tanggal_jual, tanggal_bayar, keterangan, bukti, (harga*qty) as jml_hrg FROM `penjualan`GROUP by id_penjualan");
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
        $query = mysqli_query($koneksi->conn, "SELECT max(id_penjualan) FROM penjualan");
        $row = mysqli_fetch_array($query);
        if ($row) {
            $nilai_kode = substr($row[0], 2);
            $id_penjualan = (int) $nilai_kode;
            $id_penjualan = $id_penjualan + 1;
            $id_penjualan_otomatis = "JL" . str_pad($id_penjualan, 6, "0", STR_PAD_LEFT);
        } else {
            $id_penjualan_otomatis = "JL000001";
        }
        return $id_penjualan_otomatis;
    }

    public function simpan_penjualan($id_penjualan, $id_customer, $deskripsi, $id_size, $harga, $qty, $tanggal_jual, $tanggal_bayar, $keterangan)
    {
        $koneksi = new koneksi;
        $namaGambar = $_FILES['bukti']['name'];
        $ukuranGambar = $_FILES['bukti']['size'];
        $errorGambar = $_FILES['bukti']['error'];
        $tmpGambar = $_FILES['bukti']['tmp_name'];

        if ($errorGambar === 4) {
            echo "<script>";
            echo "alert('Pilih Gambar Bukti Penjualan');";
            echo "window.history.back();";
            echo "</script>";
            die;
        }

        $exfiles = ['jpg', 'jpeg', 'png'];
        $exgb = explode('.', $namaGambar);
        $exgb = strtolower(end($exgb));
        if (!in_array($exgb, $exfiles)) {
            echo "<script>";
            echo "alert('gambar Tidak Valid');";
            echo "window.history.back();";
            echo "</script>";
            die;
        }
        $pindah = move_uploaded_file($tmpGambar, 'images/bukti/bukti' . $id_penjualan . "." . $exgb);
        $file = 'images/bukti/bukti' . $id_penjualan . "." . $exgb;
        $cek = mysqli_query($koneksi->conn, "SELECT * FROM penjualan WHERE id_penjualan = '$id_penjualan'");
        if (mysqli_num_rows($cek) == 0) {
            $query = mysqli_query($koneksi->conn, "INSERT INTO penjualan VALUES ('$id_penjualan','$id_customer','$deskripsi','$id_size','$harga','$qty','$tanggal_jual','$tanggal_bayar','$keterangan', '$file')");
            if ($query) {
                echo "<div class='alert alert-success'><span class='fa fa-check'></span> Data penjualan berhasil disimpan</div>";
            }
        }
    }
    public function hapus_penjualan($id_penjualan)
    {
        $koneksi = new koneksi;
        $query = mysqli_query($koneksi->conn, "DELETE FROM penjualan WHERE id_penjualan = '$id_penjualan'");
        if ($query) {
            echo "<div class='alert alert-success'><span class='fa fa-check'></span> Data penjualan dengan kode " . $id_penjualan . " berhasil dihapus</div>";
        }
    }

    public function edit_penjualan($id_penjualan, $id_customer, $deskripsi, $id_size, $harga, $qty, $tanggal_jual, $tanggal_bayar, $keterangan)
    {
        $koneksi = new koneksi;
        $query = mysqli_query($koneksi->conn, "UPDATE penjualan SET id_customer = '$id_customer', deskripsi ='$deskripsi', id_size='$id_size', harga='$harga', qty='$qty', tanggal_jual='$tanggal_jual', tanggal_bayar='$tanggal_bayar', keterangan='$keterangan' WHERE id_penjualan = '$id_penjualan'");
        if ($query) {
            echo "<div class='alert alert-success'><span class='fa fa-check'></span> Data penjualan berhasil diperbarui</div>";
        }
    }

    public function detail_penjualan($id_penjualan)
    {
        $koneksi = new koneksi;
        $query = mysqli_query($koneksi->conn, "SELECT * FROM penjualan WHERE id_penjualan = '$id_penjualan'");
        $row = mysqli_fetch_array($query);
        $this->id_customer = $row['id_customer'];
        $this->deskipsi = $row['deskipsi'];
        $this->id_size = $row['id_size'];
        $this->harga = $row['harga'];
        $this->qty = $row['qty'];
        $this->tanggal_jual = $row['tanggal_jual'];
        $this->tanggal_bayar = $row['tanggal_bayar'];
        $this->satuan = $row['keterangan'];
    }
}
