<?php
	require_once($_SERVER['DOCUMENT_ROOT'] . '/Inc/IncludeMySql.php');
	require_once($_SERVER['DOCUMENT_ROOT'] . '/Inc/IncludeGlobal.php');
	
	$email = $_POST['email'];
	$password = $_POST['password'];
	$refer = $_POST['refer'];
	
	if ($email == '' || $password == '')
	{
	    // No login information	
	    //header('Location: /Login_Logout/Login.php?refer='. urlencode($_POST['refer']));
		header('Location: /Login_Logout/Login.php');
	    exit;
	}
	else
	{
	    // Authenticate user
		$db = new DB();
		$db->connect_db($_DB['host'], $_DB['username'], $_DB['password'], $_DB['dbname']);
		if($db->query("SELECT userid, MD5(UNIX_TIMESTAMP() + userid + RAND(UNIX_TIMESTAMP()))
	        guid FROM susers WHERE email = '$email' AND password = '$password'") == false)
			exit;   	         
	        	    
	    if ($db->get_num_rows())
	    {	
	        $row = $db->get_fetch_row();
	        // Update the user record
	        if($db->query("UPDATE susers SET guid = '$row[1]' WHERE userid = $row[0]") == false)
	        	exit;
	        
	        // Set the cookie and redirect
	        // setcookie( string name [, string value [, int expire [, string path
	        // [, string domain [, bool secure]]]]])
	        // Setting cookie expire date, 6 hours from now
	        $cookieexpiry = (time() + $SessionTime);
	        setcookie("session_id", $row[1], $cookieexpiry, '/');
	
	        if (empty($refer) || !$refer)
	        {
	        	$refer = '/index.php';
	        }
	        	
	        header('Location: '. $refer);     
	        exit;	        
	    }
	    else
	    {  	
	        // Not authenticated    	
	        //header('Location: /Login_Logout/Login.php?refer='. urlencode($refer));
	    	header('Location: /Login_Logout/Login.php');
	        exit;
	    } 	    
	}
?>