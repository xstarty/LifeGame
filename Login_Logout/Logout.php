<?php
	require_once($_SERVER['DOCUMENT_ROOT'] . '/Inc/IncludeGlobal.php');	
	
	session_destroy();
	
	$cookieexpiry = (time() + $SessionTime);
	setcookie("session_id", 'Logout', $cookieexpiry, '/');
	
	header('Location: /index.php');	
?>