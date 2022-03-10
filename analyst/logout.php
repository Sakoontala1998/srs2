<?php
	session_start();
	unset($_SESSION['key']);
	if(session_destroy()) // Destroying All Sessions
	{
		header("Location: ../index.php");
	}
?>