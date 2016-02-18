<?php
	$dbname='share_love';
	$dbusername='arun';
	$password='arun';
	$host='localhost';

	$db=mysql_connect($host, $dbusername, $password);
	mysql_select_db($dbname);
	mysql_query("SET NAMES 'utf8'"); 
	mysql_query('SET CHARACTER SET utf8');
?>