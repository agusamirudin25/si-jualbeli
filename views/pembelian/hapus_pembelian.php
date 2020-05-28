<?php
$id_pembelian = $_GET['id_pembelian'];
$pembelian->hapus_pembelian($id_pembelian);
?>
<meta http-equiv="refresh" content="2;url=index.php?p=pembelian">
