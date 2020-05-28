<?php
require_once 'views/laporan/lihat_laporan.php';
?>
<script src="assets/js/jquery-3.1.1.min.js"></script>
<script type="text/javascript">
	var p = document.getElementById('body1');
	var c = document.getElementById('formLap');
	p.removeChild(c);
	c = document.getElementById('tombol').style.visibility = 'hidden';

	window.onafterprint = function(e) {
		$(window).off('mousemove', window.onafterprint);
		window.close();
	};
	window.print();
	setTimeout(function() {
		$(window).on('mousemove', window.onafterprint);
	}, 1);
</script>