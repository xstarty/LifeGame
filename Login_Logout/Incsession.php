<?php	
	require_once($_SERVER['DOCUMENT_ROOT'] . '/Inc/IncludeMySql.php');
	
	// Check for a cookie, if none go to login page
	if (!isset($_COOKIE['session_id']))
	{		
	    //header('Location: /Login_Logout/Login.php?refer='. urlencode(getenv('REQUEST_URI')));
		header('Location: /Login_Logout/Login.php');
	    exit;
	}
	
	// Try to find a match in the database	
	$guid = $_COOKIE['session_id'];
	
	$db = new DB();
	$db->connect_db($_DB['host'], $_DB['username'], $_DB['password'], $_DB['dbname']);
	if($db->query("SELECT userid FROM susers WHERE guid = '$guid'") == false)
		exit;	
	
	if (!$db->get_num_rows())
	{
	    // No match for guid	
		//header('Location: /Login_Logout/Login.php?refer='. urlencode(getenv('REQUEST_URI')));
		header('Location: /Login_Logout/Login.php');
		exit;
	}
?>