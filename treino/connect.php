<?php
/*
define("DB_SERVER", "localhost");
define("DB_USER", "luigi");
define("DB_PASSWORD", "calc33XGqqxFfvUj");
define("DB_DATABASE", "montele_db");

$mysqli = mysqli_connect(DB_SERVER , DB_USER, DB_PASSWORD, DB_DATABASE);
if(!$mysqli){
	echo "Error: Unable to connect to MySQL." . PHP_EOL;
	echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
	echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
	exit;
} */

define("DB_SERVER", "aguiafomento.mysql.uhserver.com");
define("DB_USER", "aguia12");
define("DB_PASSWORD", "ThL44frl@A");
define("DB_DATABASE", "aguiafomento");

$mysqli = mysqli_connect(DB_SERVER , DB_USER, DB_PASSWORD, DB_DATABASE);
if(!$mysqli){
	echo "Error: Unable to connect to MySQL." . PHP_EOL;
	echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
	echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
	exit;
}


?>
