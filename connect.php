<?php
	$dbhost = 'oniddb.cws.oregonstate.edu';
	$dbname = 'guox-db';
	$dbuser = 'guox-db';
	$dbpass = 'RCellOvATpqTBbX5';

	$mysqli = new mysqli($dbhost, $dbname, $dbpass, $dbuser);

	if($mysqli->connect_errno)
		echo "Failed to connect to MySQL: (".$mysqli->connect_errno.")". $mysqli->connect_error;
?>
