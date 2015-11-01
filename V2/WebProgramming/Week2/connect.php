<?php

//maak connectie met de database
DEFINE('DB_HOST', 'localhost');					//servername
DEFINE('DB_USERNAME', 'bright1q');					//server username
DEFINE('DB_PASSWORD', 'ysYtUvY@EtYp');					//server password
DEFINE('DB_DATABASE', 'bright1q_wp31');			//server 

$con = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

if(mysqli_connect_errno())
{
	die('Service cannot be loaded.');
}

?>