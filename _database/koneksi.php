<?php
error_reporting(E_ALL ^ E_DEPRECATED);
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'db_trash';
$konek = mysql_connect($host,$user,$pass);if ($konek) {	$ambil = mysql_select_db($db);		
	if (!$ambil) {
		echo "Database tidak bisa dibuka";		
	}
} else {	echo "MySQL tidak terhubung"; }
?>