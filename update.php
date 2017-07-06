<?php

session_start();
if(!isset($_SESSION['user_login'])){
 $username = " ";
}else{
  $username = $_SESSION['user_login'];
}


mysql_connect('localhost','root','');
	mysql_select_db('friends');

if(isset($_POST['text'])){
$date_added = date("Y-m-d");
	 
	$man=$username;
	//$user_posted_to = "juhi66";

	$text = $_POST['text'];
	if(!empty($text)){
		//$query = "INSERT INTO posts VALUES('','$text','$man','$date_added')";
		  $query = "INSERT INTO posts VALUES('','$text','$man','$date_added')";
	              
	if($query_run=mysql_query($query)){
			
$query = "SELECT * FROM posts WHERE user='$username' ORDER BY id DESC LIMIT 5";
$query_run = mysql_query($query);
while($row = mysql_fetch_assoc($query_run)){
	echo '<b>'.$row['body'].'</b><br/><br/>';
	}
	}else{
			echo 'FAILED!';
		}
}
else{
	echo 'Please type in something!';
}
}

?>