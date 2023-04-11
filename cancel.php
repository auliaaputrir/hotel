<?php 
	require('functions.php');
	session_start();
	  if (!isset($_SESSION['login'])) {
        header("Location: index.php");
        exit;
    }
	$idtamu = $_GET["id"];

	if(delete($idtamu) > 0){
		echo "
				<script>
					alert ('Data berhasil dihapus');
					document.location.href='tamu.php';
				</script>
			";
		}
		else{
			/*echo(mysqli_error($conn));*/
			echo "
				<script>
					alert ('Data gagal dihapus');
					document.location.href='tamu.php';
				</script>
			";
		}
	
?>