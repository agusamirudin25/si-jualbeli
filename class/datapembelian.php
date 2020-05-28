<?php

class datapembelian
{
    public function lihat_datapembelian($dari, $sampai)
    {
        $koneksi = new koneksi;
        $query = mysqli_query($koneksi->conn, "
        SELECT id_pembelian, id_suplier, deskripsi, id_size, qty, tanggal_beli, 
        (harga*qty) as jml_hrg FROM `pembelian`
        WHERE tanggal_beli BETWEEN '$dari' AND '$sampai'
        ");
        if (mysqli_num_rows($query) > 0) {
?>
            <tbody>
                <?php
                $total = 0;
                $no = 1;
                while ($row = mysqli_fetch_array($query)) {
                    $querySJ = mysqli_query($koneksi->conn, "SELECT DISTINCT no_surat_jalan FROM surat_jalan WHERE no_po='" . $row['no_po'] . "'");
                    $dataSJ = '';
                    for ($i = 0; $i < mysqli_num_rows($querySJ); $i++) {
                        $dataNoSJ = mysqli_fetch_array($querySJ);
                        if ($i >= 1) {
                            $dataSJ .= "<br>" . $dataNoSJ[0];
                        } else {
                            $dataSJ .= $dataNoSJ[0];
                        }
                    }
                ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $row['id_pembelian']; ?></td>
                        <td><?php echo $row['id_suplier']; ?></td>
                        <td><?php echo $row['deskripsi']; ?></td>
                        <td><?php echo $row['id_size']; ?></td>
                        <td><?php echo $row['qty']; ?></td>
                        <td><?php echo date('d-m-Y', strtotime($row['tanggal_beli'])); ?></td>
                        <td><?php echo "Rp. " . number_format($row['jml_hrg']) . ",-" ?></td>

                    <?php
                    $no++;
                    $total = $total + $row['jml_hrg'];
                } ?>
                    <tr>
                        <th colspan=7 style="text-align:right">TOTAL</th>
                        <th><?php echo "Rp. " . number_format($total) . ",-" ?></th>
                    </tr>
                    <tr>
                        <td colspan="8" class="text-left">
                            <a href="index.php?p=cetak_datapembelian&amp;dari=<?= $dari ?>&amp;sampai=<?= $sampai ?>" id="tombol" target="_blank">
                                <button class="btn btn-success"><span class="fa fa-print"></span> Cetak</button>
                            </a>
                        </td>
                    </tr>
                    <?php
                    if ($_SESSION['level'] != 'Admin') { ?>
                        <tr>
                            <td colspan="7" class="text-left">
                                <a href="index.php?p=cetak_datapembelian&dari=<?php echo $dari . '&sampai=' . $sampai; ?>" id="tombol" target="_blank">
                                    <button class="btn btn-success"><span class="fa fa-print"></span> Cetak</button>
                                </a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                <?php

            } else {
                ?>
                    <tr>
                        <th colspan=9 style="text-align:center"> MAAF DATA TIDAK TERSEDIA!</td>
                    </tr>
        <?php
            }
        }
    }
