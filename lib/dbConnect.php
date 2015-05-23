<?php

	//$dbc_file = (WP_CONTENT_DIR . '/plugins/success/lib/dbConnect.php');
	//$dbc_getData = file_get_contents($dbc_file);
	//$dbcInfo = unserialize($dbc_getData);

	//extract($dbcInfo);

	$host = 'host name or IP';
	$user = 'db username' ;
	$userPassword = 'db password';
	$database = 'db name';

	$dbc = mysql_connect($host, $user, $userPassword);
	       mysql_select_db($database, $dbc);


	/* I believe this has been dericated and we should use mysqli_connect($host, $user, $userPassword, $database); */


?>
