<?php
$no_faktur = $_GET['no_faktur'];
$faktur->hapus_faktur($no_faktur);
?>
<meta http-equiv="refresh" content="2;url=index.php?p=faktur">
