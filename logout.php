<?php
	require"functions.php";
	session_start(0);
	session_destroy();
?>
<script type="text/javascript">
	alert("Anda telah Logout");
	document.location='index.php';
</script>
