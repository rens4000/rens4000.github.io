<?php
	$server = 'localhost';
	$username = 'contest';
	$password = 'KEOYlUbmA8RdPcx3';
	$database = 'contest';

	$conn = mysqli_connect($server, $username, $password, $database);

	if(!$conn) {
		die("Could not contact MySQL database. Please try again later.");
	}
?>