<?php

$connect = mysql_connect('localhost','root','');

if(!$connect){
	die('coukd not connexct to database'.mysql_error());
}

$db_select = mysql_select_db("friends");

if(!$db_select){
die('coukd not select database'.mysql_error());
}


?>