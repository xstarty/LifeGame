<html>
<head>	
	<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/Inc/IncludeHead.php'); ?>
	<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/Login_Logout/Incsession.php'); ?>
</head>

<body>
		
	<form action="./Login_Logout/Logout.php" method="POST">
		<input type="submit" name="submit" value=<?php echo $Lang_Logout; ?>>	
	</form>
	
	<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/Inc/IncludeFooter.php'); ?>
</body>	
	
</html>