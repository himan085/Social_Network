<?php include ("include/header.php"); ?>
<?php
if (isset($_GET['u'])) {
	$username1 = mysql_real_escape_string($_GET['u']);
	if (ctype_alnum($username1)) {
 	//check user exists
	$check = mysql_query("SELECT username, first_name FROM users WHERE username='$username1'");
	if (mysql_num_rows($check)===1) {
	$gett = mysql_fetch_assoc($check);
	$username1 = $gett['username'];
	$firstname = $gett['first_name'];	
	}
	else
	{
		 //header("Location: index.php");
	echo "<meta http-equiv=\"refresh\" content=\"0; url=http://localhost/sns/index.php\">";	
	exit();
	}
	}
}
?>
	
<h3><?php echo $username1;  ?></h3>
<a href="friend_requests.php"><h4>View Friends requests</h4></a>

<div class="container">
<div class="row">
<div class="col-lg-3 col-md-3">
<?php
 //Check whether the user has uploaded a profile pic or not
  $check_pic = mysql_query("SELECT profile_pic FROM users WHERE username='$username1'");
  $get_pic_row = mysql_fetch_assoc($check_pic);
  $profile_pic_db = $get_pic_row['profile_pic'];
  if ($profile_pic_db == "") {
  $profile_pic = "img/default_pic.jpg";
  }
  else
  {
  $profile_pic = $profile_pic_db;
  }

?>

<img src="<?php echo $profile_pic; ?> " height="250" width="100%" alt="<?php echo $username1; ?>'s Profile Pic" title="<?php echo $username1; ?>'s Profile" />
<br />


<!--friend system-->
<?php

$errorMsg = "";
  if (isset($_POST['addfriend'])) {
     $friend_request = $_POST['addfriend'];
     
     $user_to = $username;
     $user_from = $username1;
     
     if ($user_to == $user_from) {
      $errorMsg = "You can't send a friend request to yourself!<br />";
     // echo $errorMsg;
     }
     else
     {
      $create_request = mysql_query("INSERT INTO friend_requests VALUES ('','$user_to','$user_from')");
      $errorMsg = "Your friend Request has been sent!";
      
     }

  }
  else
  {
   //Do nothing
  }

?>


<form action="profile.php?u=<?php echo $username1 ?>" method="POST">
<?php echo $errorMsg; ?>
<?php

$friendsArray = "";
$countFriends = "";
$friendsArray12 = "";
$addAsFriend = "";
$selectFriendsQuery = mysql_query("SELECT friend_array FROM users WHERE username='$username1'");
$friendRow = mysql_fetch_assoc($selectFriendsQuery);
$friendArray = $friendRow['friend_array'];
if ($friendArray != "") {
   $friendArray = explode(",",$friendArray);
   $countFriends = count($friendArray);
   $friendArray12 = array_slice($friendArray, 0, 12);

$i = 0;
if (in_array($username,$friendArray)) {
 echo '<input type="submit" name="removefriend" value="UnFriend">';
}
else
{
 echo '<input type="submit" name="addfriend" value="Add Friend">';
}

}
else
{
 echo '<input type="submit" name="addfriend" value="Add Friend">';
}

//REMOVE FRIEND
if (@$_POST['removefriend']) {
  //Friend array for logged in user
  $add_friend_check = mysql_query("SELECT friend_array FROM users WHERE username='$username'");
  $get_friend_row = mysql_fetch_assoc($add_friend_check);
  $friend_array = $get_friend_row['friend_array'];
  $friend_array_explode = explode(",",$friend_array);
  $friend_array_count = count($friend_array_explode);
  
  //Friend array for user who owns profile
  $add_friend_check_username1 = mysql_query("SELECT friend_array FROM users WHERE username='$username1'");
  $get_friend_row_username1 = mysql_fetch_assoc($add_friend_check_username1);
  $friend_array_username1 = $get_friend_row_username['friend_array'];
  $friend_array_explode_username1 = explode(",",$friend_array_username1);
  $friend_array_count_username1 = count($friend_array_explode_username1);
  
  $username1Comma = ",".$username1;
  $username1Comma2 = $username1.",";
  
  $usernameComma = ",".$username;
  $usernameComma2 = $username.",";
  
  if (strstr($friend_array,$username1Comma)) {
   $friend1 = str_replace("$username1Comma","",$friend_array);
  }
  else
  if (strstr($friend_array,$username1Comma2)) {
   $friend1 = str_replace("$username1Comma2","",$friend_array);
  }
  else
  if (strstr($friend_array,$username1)) {
   $friend1 = str_replace("$username1","",$friend_array);
  }
  //Remove logged in user from other persons array
  if (strstr($friend_array,$usernameComma)) {
   $friend2 = str_replace("$usernameComma","",$friend_array_username1);
  }
  else
  if (strstr($friend_array,$usernameComma2)) {
   $friend2 = str_replace("$usernameComma2","",$friend_array_username1);
  }
  else
  if (strstr($friend_array,$username)) {
   $friend2 = str_replace("$username","",$friend_array_username1);
  }

  //$friend2 = "";

  $removeFriendQuery = mysql_query("UPDATE users SET friend_array='$friend1' WHERE username='$username'");
  $removeFriendQuery_username1 = mysql_query("UPDATE users SET friend_array='$friend2' WHERE username='$username1'");
  echo "Friend Removed ...";
  header("Location: profile.php?u=$username1");
}



//REMOVE FRIEND

if(isset($_POST['sendmsg'])){
header("Location: send_msg.php?u=$username1 ");
}

//Poke code
if (@$_POST['poke']) {
  $check_if_poked = mysql_query("SELECT * FROM pokes WHERE user_to='$username1' && user_from='$username'");
  $num_poke_found = mysql_num_rows($check_if_poked);
  if ($num_poke_found == 1) {
   echo "You must wait to be poked back.";
  }
  else
  if ($username1 == $username) {
   echo "You cannot Poke yourself.";
  }
  else
  {
 $poke_user = mysql_query("INSERT INTO pokes VALUES ('','$username','$username1')");
 echo "$username1 has been poked.";
  }
}

if(isset($_POST['view_albums'])){
header("Location: view_albums.php?u=$username1 ");
}

?>

<!--<input type="submit" name="addfriend" value="Add as friend"/>-->
<input type="submit" name="poke" value="Poke" />
<input type="submit" name="sendmsg" value="Send Messgae"/>
</form>
<!--friend system-->


<br />
<div style="height:120px; width:100%; border:1px solid black">
<?php
$query = "SELECT bio FROM users WHERE username='$username1'";
$query_run = mysql_query($query);
$row = mysql_fetch_assoc($query_run);
$bio = $row['bio'];
echo $bio;
?>
</div>


<div class="row">
<h4><?php echo $username1; ?>'s Friends</h4>

<?php
if ($countFriends != 0) {
foreach ($friendArray12 as $key => $value) {
 $i++;
 $getFriendQuery = mysql_query("SELECT * FROM users WHERE username='$value' LIMIT 1");
 $getFriendRow = mysql_fetch_assoc($getFriendQuery);
 $friendUsername = $getFriendRow['username'];
 $friendProfilePic = $getFriendRow['profile_pic'];

 if ($friendProfilePic == "") {
  echo "<div class=\"col-lg-4 col-md-4 col-sm-4\" ><a href='profile.php?u=$friendUsername'><img  src='img/default_pic.jpg' alt=\"$friendUsername's Profile\" title=\"$friendUsername's Profile\" height='70' width='90' style='padding-right: 6px;'></a></div>";
 }
 else
 {
  echo "<a href='profile.php?u=$friendUsername'><img src='$friendProfilePic' alt=\"$friendUsername's Profile\" title=\"$friendUsername's Profile\" height='70' width='90' style='padding-right: 6px;'></a>";
 }
}
}
else
echo $username1." has no friends yet.";
?>

</div>
<br/><br/>


</div>
<script >

function insert(){

if(window.XMLHttpRequest){
        xmlhttp = new XMLHttpRequest();
    } else{
        xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
    }
    
    xmlhttp.onreadystatechange = function(){
        if(xmlhttp.readyState == 4 && xmlhttp.status == 200 ){
            document.getElementById('message').innerHTML = xmlhttp.responseText;
        }        
    }   
    
param = 'text='+document.getElementById('text').value;

    xmlhttp.open('POST', 'update.php', true);
    xmlhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
    xmlhttp.send(param);
   
}

</script>
<div class="col-lg-9 col-md-9">
<div  style="height:150px; width:100%; border:1px solid black">
<!--<form action="<?php echo 'profile.php?u='.$username; ?>" method="POST">-->
<textarea  name="text" id="text" rows="8" cols="100"></textarea>
<input type="submit" name="send" onclick="insert();" value="Post" style="background-color: #DCE5EE; float: right; border: 1px solid #666; color:#666;height:130px; width: 130px;" />
<!--</form>-->
</div><br/>
<div id="message"  style="height:350px; width:100%; border:1px solid black">
<?php 
mysql_connect('localhost','root','');
	mysql_select_db('friends');

$query = "SELECT * FROM posts WHERE user='".$username1."' ORDER BY id DESC LIMIT 5";
$query_run = mysql_query($query);
while($row = mysql_fetch_assoc($query_run)){
	echo '<b>'.$row['body'].'</b><br/><br/>';

}
?>
</div>
</div>
</div>
</div>

<?php 
include ("include/footer.php");
?>


