<?php
$id_penjualan = $_GET['id_penjualan'];
$penjualan->hapus_penjualan($id_penjualan);
?>
<meta http-equiv="refresh" content="2;url=index.php?p=penjualan">
