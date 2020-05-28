<?php
$conn = mysqli_connect("localhost", "root", "", "jualbeli");

$id_penjualan = $_GET['id_penjualan'];
if ($id_penjualan != false) {
    $query = mysqli_query($conn, "
            SELECT DISTINCT id_customer, id_size, harga, qty, tanggal_bayar FROM penjualan WHERE id_penjualan = '$id_penjualan'
        ");
    while ($d = mysqli_fetch_assoc($query)) {
        echo $d['id_customer'] . " " . $d['id_size'] . " " . $d['harga'] . " " . $d['qty'] . " " . $d['tanggal_bayar'];
    }
}
