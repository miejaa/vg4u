<?php 

	session_start();
	if(isset($_SESSION['username'])){
		$_SESSION = array();
		session_destroy();
		echo '<script language="javascript">';
		echo 'window.location.href="../homepage.php"';
		echo'</script>';
	
	}
		
?>