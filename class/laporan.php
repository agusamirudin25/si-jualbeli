<?php

class laporan
{
    public function lihat_laporan($dari, $sampai)
    {
        $koneksi = new koneksi;
        $query = mysqli_query($koneksi->conn, "
            SELECT d.no_faktur, d.no_po,
            c.nama_customer, d.total, d.tgl
            FROM detail_transaksi d 
            JOIN customer c ON c.kode_customer = d.kode_customer
            WHERE d.tgl BETWEEN '$dari' AND '$sampai'
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
        <td><?php echo $row['no_faktur']; ?></td>
        <td><?php echo $row['no_po']; ?></td>
        <td><?php echo $dataSJ; ?></td>
        <td><?php echo $row['nama_customer']; ?></td>
        <td><?php echo date('d-m-Y', strtotime($row['tgl'])); ?></td>
        <td><?php echo "Rp. " . number_format($row['total']) . ",-" ?></td>

        <?php
                        $no++;
                        $total = $total + $row['total'];
                    } ?>
    <tr>
        <th colspan=6 style="text-align:right">TOTAL</th>
        <th><?php echo "Rp. " . number_format($total) . ",-" ?></th>
    </tr>
    <?php
                if ($_SESSION['level'] != 'Direktur') { ?>
    <tr>
        <td colspan="7" class="text-left">
            <a href="index.php?p=cetak_laporan&dari=<?php echo $dari . '&sampai=' . $sampai; ?>" id="tombol" target="_blank">
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
