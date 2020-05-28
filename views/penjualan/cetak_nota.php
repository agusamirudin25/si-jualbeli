<?php
require_once 'views/po/detail_po.php';
?>
<script src="assets/js/jquery-3.1.1.min.js"></script>
<script type="text/javascript">
	var p = document.getElementById('tombol');
	var c = document.getElementById('btn-nota1');
	p.removeChild(c);
	c = document.getElementById('btn-nota2');
	p.removeChild(c);

	window.onafterprint = function(e) {
		$(window).off('mousemove', window.onafterprint);
		window.close();
	};
	window.print();
	setTimeout(function() {
		$(window).on('mousemove', window.onafterprint);
	}, 1);
</script>