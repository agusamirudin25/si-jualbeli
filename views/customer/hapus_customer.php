<?php
$id_customer = $_GET['id_customer'];
$customer->hapus_customer($id_customer);
?>
<meta http-equiv="refresh" content="2;url=index.php?p=customer">
