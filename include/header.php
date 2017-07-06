<?php include ("include/connect.php");

session_start();
if(!isset($_SESSION['user_login'])){
 $username = "";
}else{
  $username = $_SESSION['user_login'];
}


  ?>




<!doctype html>
<html>
<head>
<title>findFriends</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/style.css" />
<srcipt  src="js/main.js" type="text/javascript"></srcipt>
</head>
<body >

<script >

function findmatch(){
    if(window.XMLHttpRequest){
        xmlhttp = new XMLHttpRequest();
    } else{
        xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
    }
    
    xmlhttp.onreadystatechange = function(){
        if(xmlhttp.readyState == 4 && xmlhttp.status == 200 ){
            document.getElementById('results').innerHTML = xmlhttp.responseText;
        }        
    }   
    
    xmlhttp.open('GET', 'yo1.php?search_text='+document.search.search_text.value, true);
    xmlhttp.send();
    
}

</script>
    <div class="headerMenu">
		<div class="container">
		<div class="row">
        		<div class="col-sm-12 col-md-3 col-lg-2 "> <a href="index.php"><img src="img/find_friends_logo.png" alt=" " /></a>   </div>
      			<div class="col-sm-12 col-md-4 col-lg-4">
        		<form  action="search.php" method="GET"  name="search">
                   <div class="col-sm-12 col-md-12 col-lg-12">
                   <input class="form-control input-sm" type="text" onkeyup="findmatch();" name="search_text" id="search" placeholder="Search..."/>
                   </div>
        		</form>
            <div id="results"> </div>
        		</div>
            <div class="col-sm-12 col-md-5 col-lg-6">
<ul style="list-style-type: none;">
<?php


$num_of_messages = mysql_query("SELECT * FROM pvt_messages WHERE user_to='$username' && opened='no' && deleted='no'");
$num_rows = mysql_numrows($num_of_messages);

if(!$username){echo '
   <li style="float: right;  padding:10px"><a style="display: block; color: white;" href="index.php">LogIn</a></li>
    <li style="float: right;padding:10px"><a style="display: block; color: white;" href="index.php">SignUp</a></li>
    <li style="float: right; padding:10px"><a style="display: block; color:white;" href="index.php">findFriend</a></li>
    ';
  }else{
    echo '   
  <li style="float: right;padding:10px"><a style="display: block; color: white;" href="index.php">findFriends</a></li>
   <li style="float: right;  padding:10px"><a style="display: block; color: white;" href="logout.php">LogOut</a></li>
    <li style="float: right;padding:10px"><a style="display: block; color: white;" href="account_settings.php">Account</a></li>
     <li style="float: right;padding:10px"><a style="display: block; color: white;" href="home.php">Home</a></li>
     <li style="float: right;padding:10px"><a style="display: block; color: white;" href="my_pokes.php">Pokes</a></li>
       <li style="float: right;padding:10px"><a style="display: block; color: white;" href="my_messages.php">Messages('.$num_rows.')</a></li>
       <li style="float: right; padding:10px"><a style="display: block; color:white;" href="profile.php?u='.$username.'">Profile</a></li>
    ';
  }
  ?>
  </ul>
  </div>
        	</div>
		</div>
	</div>
