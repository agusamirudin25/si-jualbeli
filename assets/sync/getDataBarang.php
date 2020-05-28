<?php
$conn = mysqli_connect("localhost", "root", "", "db__penjualan");

$kode_barang = $_GET['kode_barang'];
if ($kode_barang != false) {
    $query = mysqli_query($conn, "
            SELECT harga, satuan FROM barang WHERE kode_barang = '$kode_barang'
        ");
    while ($d = mysqli_fetch_assoc($query)) {
        echo $d['harga'] . " " . $d['satuan'];
    }
}
