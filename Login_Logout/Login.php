<html>

<head>	
	<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/Inc/IncludeHead.php'); ?>	
</head>

<body>	
	
	<form action="ActionLogin.php" method="POST">
		<?php echo $Lang_Email . $Lang_Colon; ?><br />
		<input type="text" name="email">
		<br />
		<?php echo $Lang_Password . $Lang_Colon; ?><br />
		<input type="password" name="password">
		<br />
		<input type="submit" name="submit" value=<?php echo $Lang_Login; ?>>
		<!-- <input type="hidden" name="refer" value="<?php //echo (isset($_GET['refer'])) ? $_GET['refer'] : 'index.php'; ?>"> -->
	</form>

	<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/Inc/IncludeFooter.php'); ?>
</body>
</html>