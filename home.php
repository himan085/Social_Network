<?php
include ("include/header.php");
?>

<?php

$friendsArray = "";
$countFriends = "";
$friendsArray12 = "";
$addAsFriend = "";
$selectFriendsQuery = mysql_query("SELECT friend_array FROM users WHERE username='$username'");
$friendRow = mysql_fetch_assoc($selectFriendsQuery);
$friendArray = $friendRow['friend_array'];
if ($friendArray != "") {
   $friendArray = explode(",",$friendArray);
   $countFriends = count($friendArray);
   $friendArray12 = array_slice($friendArray, 0, 12);
?>

<div class = "container">
<h3>News Feed</h3>
<div class="row ">


<?php
if ($countFriends != 0) {
foreach ($friendArray12 as $key => $value) {

 $getFriendQuery = mysql_query("SELECT * FROM users WHERE username='$value' LIMIT 1");
 $getFriendRow = mysql_fetch_assoc($getFriendQuery);
 $friendUsername = $getFriendRow['username'];
 $friendProfilePic = $getFriendRow['profile_pic'];
$get_post_query = mysql_query("SELECT * FROM posts WHERE user ='$friendUsername' ORDER BY id DESC ");
//SELECT * FROM `posts` WHERE user='palit';
while($get_post = mysql_fetch_assoc($get_post_query)){
	
	$post_body = $get_post['body'];
echo"
<div class=\"row\" >
<div class=\"col-lg-2\">
<a href='profile.php?u=$friendUsername'><img src='$friendProfilePic' alt=\"$friendUsername's Profile\" title=\"$friendUsername's Profile\" height='70' width='90' style='padding-right: 6px;'></a>
<a href='profile.php?u=$friendUsername'><span style=\"font-size:20px;\">$friendUsername</a>
</div>
<div class=\"col-lg-4\">
$post_body
</div>

</div>

<br/>
"; 
//include("like_but_frame.php");

}




}
}
}
else
echo $username." has no friends yet.";
?>

</div>
</div>

<?php 
include ("include/footer.php");
?>