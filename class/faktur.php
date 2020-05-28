<?php
class faktur
{
    public function tampil_faktur()
    {
        $koneksi = new koneksi;
        $query = mysqli_query($koneksi->conn, "SELECT no_faktur, id_penjualan, id_customer, id_size, jml_hrg, tanggal_bayar, bukti FROM `faktur`");
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
        $query = mysqli_query($koneksi->conn, "SELECT max(no_faktur) FROM faktur");
        $row = mysqli_fetch_array($query);
        if ($row) {
            $nilai_kode = substr($row[0], 2);
            $id_faktur = (int) $nilai_kode;
            $id_faktur = $id_faktur + 1;
            $id_faktur_otomatis = "FK" . str_pad($id_faktur, 6, "0", STR_PAD_LEFT);
        } else {
            $id_faktur_otomatis = "FK000001";
        }
        return $id_faktur_otomatis;
    }

    public function simpan_faktur($no_faktur, $id_penjualan, $id_customer, $id_size, $harga, $qty, $tanggal_bayar)
    {
        $koneksi = new koneksi;
        $namaGambar = $_FILES['bukti']['name'];
        $ukuranGambar = $_FILES['bukti']['size'];
        $errorGambar = $_FILES['bukti']['error'];
        $tmpGambar = $_FILES['bukti']['tmp_name'];

        if ($errorGambar === 4) {
            echo "<script>";
            echo "alert('Pilih Gambar Bukti Pengiriman');";
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
        $pindah = move_uploaded_file($tmpGambar, 'images/bukti/bukti' . $no_faktur . "." . $exgb);
        $file = 'images/bukti/bukti' . $no_faktur . "." . $exgb;
        $cek = mysqli_query($koneksi->conn, "SELECT * FROM faktur WHERE no_faktur = '$no_faktur'");
        $jml_hrg = $harga * $qty;
        if (mysqli_num_rows($cek) == 0) {
            $query = mysqli_query($koneksi->conn, "INSERT INTO faktur VALUES ('$no_faktur', '$id_penjualan','$id_customer','$id_size','$jml_hrg','$tanggal_bayar', '$file')");
            if ($query) {
                echo "<div class='alert alert-success'><span class='fa fa-check'></span> Data faktur berhasil disimpan</div>";
            }
        }
    }
    public function hapus_faktur($id_faktur)
    {
        $koneksi = new koneksi;
        $query = mysqli_query($koneksi->conn, "DELETE FROM faktur WHERE no_faktur = '$id_faktur'");
        if ($query) {
            echo "<div class='alert alert-success'><span class='fa fa-check'></span> Data faktur dengan kode " . $id_faktur . " berhasil dihapus</div>";
        }
    }


    public function detail_faktur($no_faktur)
    {
        $koneksi = new koneksi;
        $query = mysqli_query($koneksi->conn, "SELECT * FROM faktur WHERE no_faktur = '$no_faktur'
            ");
        if (mysqli_num_rows($query) > 0) {
            $no = 1;
            $total = 0;
            while ($row = mysqli_fetch_array($query)) {
?>
                <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $row['no_faktur']; ?></td>
                    <td><?php echo $row['id_penjualan']; ?></td>
                    <td><?php echo $row['id_customer']; ?></td>
                    <td><?php echo $row['id_size']; ?></td>
                    <th>Rp. <?= number_format($row['jml_hrg'], 0, ",", ".") ?></th>
                </tr>
            <?php
                $no++;
                $total = $total + $row['jml_hrg'];
            } ?>
            <tr>
                <th colspan="5" style="text-align:right">Total </th>
                <th class="text-center">Rp. <?php echo  number_format($total, 0, ",", "."); ?></th>
            </tr>
            <tr>
                <th colspan="5" style="text-align:right">PPN 10% </th>
                <th class="text-center">Rp. <?php echo  number_format($total * 0.1, 0, ",", "."); ?></th>
            </tr>
            <tr>
                <th colspan="5" style="text-align:right"><b>Grand Total </b></th>
                <th class="text-center"><b>Rp. <?php echo  number_format($total + ($total * 0.1), 0, ",", "."); ?></b></th>
            </tr>

<?php }
    }
}
