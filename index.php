<?php include ("include/header.php");  ?>


<?php
$reg = @$_POST['reg'];
//declaring variables to prevent errors
$fn = ""; //First Name
$ln = ""; //Last Name
$un = ""; //Username
$em = ""; //Email
$em2 = ""; //Email 2
$pswd = ""; //Password
$pswd2 = ""; // Password 2
$d = ""; // Sign up Date
$u_check = ""; // Check if username exists
//registration form
$fn = strip_tags(@$_POST['fname']);
$ln = strip_tags(@$_POST['lname']);
$un = strip_tags(@$_POST['username']);
$em = strip_tags(@$_POST['email']);
$em2 = strip_tags(@$_POST['email2']);
$pswd = strip_tags(@$_POST['password']);
$pswd2 = strip_tags(@$_POST['password2']);
$d = date("Y-m-d"); // Year - Month - Day

if ($reg) {
if ($em==$em2) {
// Check if user already exists
$u_check = mysql_query("SELECT username FROM users WHERE username='$un'");
// Count the amount of rows where username = $un
$check = mysql_num_rows($u_check);
//Check whether Email already exists in the database
$e_check = mysql_query("SELECT email FROM users WHERE email='$em'");
//Count the number of rows returned
$email_check = mysql_num_rows($e_check);
if ($check == 0) {
  if ($email_check == 0) {
//check all of the fields have been filed in
if ($fn&&$ln&&$un&&$em&&$em2&&$pswd&&$pswd2) {
// check that passwords match
if ($pswd==$pswd2) {
// check the maximum length of username/first name/last name does not exceed 25 characters
if (strlen($un)>25||strlen($fn)>25||strlen($ln)>25) {
echo "The maximum limit for username/first name/last name is 25 characters!";
}
else
{
// check the maximum length of password does not exceed 25 characters and is not less than 5 characters
if (strlen($pswd)>30||strlen($pswd)<5) {
echo "Your password must be between 5 and 30 characters long!";
}
else
{
//encrypt password and password 2 using md5 before sending to database
$pswd = md5($pswd);
$pswd2 = md5($pswd2);
$query = mysql_query("INSERT INTO users VALUES ('','$un','$fn','$ln','$em','$pswd','$d','0','Write something about yourself.','','','no')");
die("<h2>Welcome to findFriends</h2>Login to your account to get started ...");
}
}
}
else {
echo "Your passwords don't match!";
}
}
else
{
echo "Please fill in all of the fields";
}
}
else
{
 echo "Sorry, but it looks like someone has already used that email!";
}
}
else
{
echo "Username already taken ...";
}
}
else {
echo "Your E-mails don't match!";
}
}
?>


<?php
//Login Script
if (isset($_POST["user_login"]) && isset($_POST["password_login"])) {
  $user_login = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["user_login"]); // filter everything but numbers and letters
    $password_login = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["password_login"]); // filter everything but numbers and letters
  $md5password_login = md5($password_login);
    $sql = mysql_query("SELECT id FROM users WHERE username='$user_login' AND password='$md5password_login' LIMIT 1"); // query the person
  //Check for their existance
  $userCount = mysql_num_rows($sql); //Count the number of rows returned
  if ($userCount == 1) {
    while($row = mysql_fetch_array($sql)){ 
             $id = $row["id"];
             $closed = @$row["closed"];
  }
     //$_SESSION["id"] = $id;
 
     $_SESSION["user_login"] = $user_login;
    header("Location: home.php");

         exit();
      
    } else {
    echo 'That information is incorrect, try again';
    exit();
  }
}
?>


<div style="float: left; margin-left: 50px">
            <h2>Already a Memeber? Login below ...</h2>
            <form action="index.php" method="post" name="form1" id="form1">
        <input type="text" size="40" name="user_login" id="user_login" placeholder="User Name"  /><br /><br />
        <input type="text" size="40" name="password_login" id="password_login" placeholder="Pass word"  /><br /><br />
        <input type="submit" name="button" id="button" value="Login to your account">
      </form>
</div>


   <div style="float: right; width: 350px; margin-right: 50px">
            <h2>Sign up Below ...</h2>
           <form action="index.php" method="POST">
           <input type="text" size="40" name="fname"  class="auto-clear" placeholder="First Name" ><br /><br />
           <input type="text" size="40" name="lname" class="auto-clear" placeholder="Last Name" ><br /><br />
           <input type="text" size="40" name="username" class="auto-clear" placeholder="Username" ><br /><br />
           <input type="text" size="40" name="email" class="auto-clear" placeholder="Email" ><br/><br />
           <input type="text" size="40" name="email2" class="auto-clear" placeholder="Repeat Email" ><br /><br />
           <input type="password" size="40" name="password" placeholder="Password ..."><br /><br />
           <input type="password" size="40" name="password2" placeholder="Password ..."><br /><br />
           <input type="submit" name="reg" value="Sign Up!">
           </form>
           </div>
	 

<?php include ("include/footer.php");  ?>
