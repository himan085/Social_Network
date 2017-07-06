<?php

if(isset($_GET['search_text'])) {
	$search_text = $_GET['search_text'];
}

if(!empty($search_text)){
if(@mysql_connect('localhost','root','')){
	if(@mysql_select_db('friends')){

		$query = "SELECT username FROM users WHERE username like '".mysql_real_escape_string($search_text)."%'";
		$query_run = mysql_query($query);

		while($query_row = mysql_fetch_assoc($query_run)){
			echo $name = '<a href="profile.php?u='.$query_row['username'].'" style="color:white">'.$query_row['username'].'</a><br/>';
		}
	}
}
}
?>