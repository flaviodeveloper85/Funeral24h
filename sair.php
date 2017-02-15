<?php
	session_start();
	unset($_SESSION['email']);
	unset($_SESSION['pass']);
	session_destroy();

	echo "<script>location.href='http://www.funeral24h.com.br'</script>";
?>