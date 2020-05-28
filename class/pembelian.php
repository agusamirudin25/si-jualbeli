<?php
class pembelian
{
    public function tampil_pembelian()
    {
        $koneksi = new koneksi;
        $query = mysqli_query($koneksi->conn, "SELECT id_pembelian, id_suplier, deskripsi, id_size, harga, qty, tanggal_beli, 
        tanggal_bayar, keterangan, bukti, (harga*qty) as jml_hrg FROM `pembelian`GROUP by id_pembelian");
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
        $query = mysqli_query($koneksi->conn, "SELECT max(id_pembelian) FROM pembelian");
        $row = mysqli_fetch_array($query);
        if ($row) {
            $nilai_kode = substr($row[0], 2);
            $id_pembelian = (int) $nilai_kode;
            $id_pembelian = $id_pembelian + 1;
            $id_pembelian_otomatis = "BL" . str_pad($id_pembelian, 6, "0", STR_PAD_LEFT);
        } else {
            $id_pembelian_otomatis = "BL000001";
        }
        return $id_pembelian_otomatis;
    }

    public function simpan_pembelian($id_pembelian, $id_suplier, $deskripsi, $id_size, $harga, $qty, $tanggal_beli, $tanggal_bayar, $keterangan)
    {
        $koneksi = new koneksi;
        $namaGambar = $_FILES['bukti']['name'];
        $ukuranGambar = $_FILES['bukti']['size'];
        $errorGambar = $_FILES['bukti']['error'];
        $tmpGambar = $_FILES['bukti']['tmp_name'];

        if ($errorGambar === 4) {
            echo "<script>";
            echo "alert('Pilih Gambar Bukti Pembelian');";
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
        $pindah = move_uploaded_file($tmpGambar, 'images/bukti/bukti' . $id_pembelian . "." . $exgb);
        $file = 'images/bukti/bukti' . $id_pembelian . "." . $exgb;
        $cek = mysqli_query($koneksi->conn, "SELECT * FROM pembelian WHERE id_pembelian = '$id_pembelian'");
        if (mysqli_num_rows($cek) == 0) {
            $query = mysqli_query($koneksi->conn, "INSERT INTO pembelian VALUES ('$id_pembelian','$id_suplier','$deskripsi','$id_size','$harga','$qty','$tanggal_beli','$tanggal_bayar','$keterangan', '$file')");
            if ($query) {
                echo "<div class='alert alert-success'><span class='fa fa-check'></span> Data pembelian berhasil disimpan</div>";
            }
        }
    }
    public function hapus_pembelian($id_pembelian)
    {
        $koneksi = new koneksi;
        $query = mysqli_query($koneksi->conn, "DELETE FROM pembelian WHERE id_pembelian = '$id_pembelian'");
        if ($query) {
            echo "<div class='alert alert-success'><span class='fa fa-check'></span> Data pembelian dengan kode " . $id_pembelian . " berhasil dihapus</div>";
        }
    }

    public function edit_pembelian($id_pembelian, $id_suplier, $deskripsi, $id_size, $harga, $qty, $tanggal_beli, $tanggal_bayar, $keterangan)
    {
        $koneksi = new koneksi;
        $query = mysqli_query($koneksi->conn, "UPDATE pembelian SET id_suplier = '$id_suplier', deskripsi ='$deskripsi', id_size='$id_size', harga='$harga', qty='$qty', tanggal_beli='$tanggal_beli', tanggal_bayar='$tanggal_bayar', keterangan='$keterangan' WHERE id_pembelian = '$id_pembelian'");
        if ($query) {
            echo "<div class='alert alert-success'><span class='fa fa-check'></span> Data pembelian berhasil diperbarui</div>";
        }
    }

    public function detail_pembelian($id_pembelian)
    {
        $koneksi = new koneksi;
        $query = mysqli_query($koneksi->conn, "SELECT * FROM pembelian WHERE id_pembelian = '$id_pembelian'");
        $row = mysqli_fetch_array($query);
        $this->id_suplier = $row['id_suplier'];
        $this->deskipsi = $row['deskipsi'];
        $this->id_size = $row['id_size'];
        $this->harga = $row['harga'];
        $this->qty = $row['qty'];
        $this->tanggal_beli = $row['tanggal_beli'];
        $this->tanggal_bayar = $row['tanggal_bayar'];
        $this->satuan = $row['keterangan'];
    }
}
