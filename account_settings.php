<?php 

include ("include/header.php");
if ($username == "") {
die ("You must be logged in to view this page!");
}
else
{
 //echo '<b>change ur setting!</b></br>';
}

?>


<?php
  $senddata = @$_POST['senddata'];

  //Password variables
  $old_password = strip_tags(@$_POST['oldpassword']);
  $new_password = strip_tags(@$_POST['newpassword']);
  $repeat_password = strip_tags(@$_POST['newpassword2']);

  if ($senddata) {
  //If the form has been submitted ...

  $password_query = mysql_query("SELECT * FROM users WHERE username='$username'");
  while ($row = mysql_fetch_assoc($password_query)) {
        $db_password = $row['password'];
        
        //md5 the old password before we check if it matches
        $old_password_md5 = md5($old_password);
        
        //Check whether old password equals $db_password
        if ($old_password_md5 == $db_password) {
         //Continue Changing the users password ...
         //Check whether the 2 new passwords match
         if ($new_password == $repeat_password) {
            if (strlen($new_password) <= 4) {
             echo "Sorry! But your password must be more than 4 character long!";
            }
            else
            {

            //md5 the new password before we add it to the database
            $new_password_md5 = md5($new_password);
           //Great! Update the users passwords!
           $password_update_query = mysql_query("UPDATE users SET password='$new_password_md5' WHERE username='$username'");
           echo "Success! Your password has been updated!";

            }
         }
         else
         {
          echo "Your two new passwords don't match!";
         }
        }
        else
        {
         echo "The old password is incorrect!";
        }
  }
   }
  else
  {
   echo "";
  }


  $updateinfo = @$_POST['updateinfo'];

  //First Name, Last Name and About the user query
  $get_info = mysql_query("SELECT first_name, last_name, bio FROM users WHERE username='$username'");
  $get_row = mysql_fetch_assoc($get_info);
  $db_first_name = $get_row['first_name'];
  $db_last_name = $get_row['last_name'];
  $db_bio = $get_row['bio'];

  //Submit what the user types into the database
  if ($updateinfo) {
   $firstname = strip_tags(@$_POST['fname']);
   $lastname = strip_tags(@$_POST['lname']);
   $bio = @$_POST['bio'];


   if (strlen($firstname) < 4) {
    echo "Your first name must be 4 more more characters long.";
   }
   else
   if (strlen($lastname) < 4) {
    echo "Your last name must be 4 more more characters long.";
   }
   else
   {
    //Submit the form to the database
    $info_submit_query = mysql_query("UPDATE users SET first_name='$firstname', last_name='$lastname', bio='$bio' WHERE username='$username'");
    echo "Your profile info has been updated!";
    header('Location: profile.php?u='.$username);
   }
  }
  else
  {
   //Do nothing
  }


  //Check whether the user has uploaded a profile pic or not
  $check_pic = mysql_query("SELECT profile_pic FROM users WHERE username='$username'");
  $get_pic_row = mysql_fetch_assoc($check_pic);
  $profile_pic_db = $get_pic_row['profile_pic'];
  if ($profile_pic_db == "") {
  $profile_pic = "img/default_pic.jpg";
  }
  else
  {
  $profile_pic = $profile_pic_db;
  }


  
  //Profile Image upload script
  $target_dir = "uploads/profile_pics/";
$target_file = $target_dir . basename(@$_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
	$pic = $_POST["submit"];
	if(!empty($pic)){
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if (@$_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if (@$uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
   
    $profile_pic_query = mysql_query("UPDATE users SET profile_pic='$target_file' WHERE username='$username'");
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        header('Location: profile.php?u='.$username);
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
}
else{
	echo '<b>Please choose an image!</b>';
}

}
?>

<div class="container">
<h2>Edit your Account Settings below</h2>
<hr />
<center>
<p>UPLOAD YOUR PROFILE PHOTO:</p>
<form action="" method="POST" enctype="multipart/form-data">
<img class="img-thumbnail" src="<?php echo $profile_pic; ?>" width="200" />
  <input type="file" name="fileToUpload" id="fileToUpload"><br/>
    <input class="btn btn-primary" type="submit" value="Upload Image" name="submit">
</form>
</center>
<hr />

<div class="row">

<div class="col-sm-12 col-md-6 col-lg-6">
<form action="account_settings.php" method="post">
<p>CHANGE YOUR PASSWORD:</p> <br />
Your Old Password: <input class="form-control" type="text" name="oldpassword" id="oldpassword" size="40"><br />
Your New Password: <input class="form-control"  type="text" name="newpassword" id="newpassword" size="40"><br />
Repeat Password  : <input class="form-control"  type="text" name="newpassword2" id="newpassword2" size="40"><br />
<input type="submit" class="btn btn-success" name="senddata" id="senddata" value="Change Password">
</form>
<hr />
<form action="close_account.php" method="post">
<p>CLOSE ACCOUNT:</p> <br />
<input class="btn btn-danger" type="submit" name="closeaccount" id="closeaccount" value="Close My Account">
</form>
</div>

<div class="col-sm-12 col-md-6 col-lg-6">
<form action="account_settings.php" method="post">
<p>UPDATE YOUR PROFILE INFO:</p> <br />
First Name: <input class="form-control"  type="text" name="fname" id="fname" size="40" value="<?php echo $db_first_name; ?>" ><br />
Last Name: <input class="form-control"  type="text" name="lname" id="lname" size="40" value="<?php echo $db_last_name; ?>" ><br />
About You: <textarea class="form-control"  name="bio" id="bio" rows="7" cols="40"><?php echo $db_bio; ?></textarea>

<hr />
<input type="submit" class="btn btn-success" name="updateinfo" id="updateinfo" value="Update Information">
</form>
</div>

</div>




<hr />
<br />
<br />
</div>

<?php 
include ("include/footer.php");
?>