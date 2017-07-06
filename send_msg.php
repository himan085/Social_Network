<?php
 include ("include/header.php"); 

if (isset($_GET['u'])) {
    $username1 = mysql_real_escape_string($_GET['u']);
    if (ctype_alnum($username)) {
    //check user exists
    $check = mysql_query("SELECT username FROM users WHERE username='$username1'");
    if (mysql_num_rows($check)===1) {
    $get = mysql_fetch_assoc($check);
    $username1 = $get['username'];
    
    //Check user isn't sending themself a private message
    if ($username1 != $username) {
          if (isset($_POST['submit'])) {
            $msg_title = strip_tags(@$_POST['msg_title']);
            $msg_body = strip_tags(@$_POST['msg_body']);
            $date = date("Y-m-d");
            $opened = "no";
            $deleted = "no";
            
            if ($msg_title == "Enter the message title here ...") {
             echo "Please give your message a title.";
            }
            else
            if (strlen($msg_title) < 3) {
             echo "Your message title cannot be less than 3 characters in length!";
            }
            else
            if ($msg_body == "Enter the message you wish to send ...") {
             echo "Please write a message.";
            }
            else
            if (strlen($msg_body) < 3) {
             echo "Your message cannot be less than 3 characters in length!";
            }
            else
            {

            $send_msg = mysql_query("INSERT INTO pvt_messages VALUES ('','$username','$username1','$msg_title','$msg_body','$date','$opened','$deleted')");
           echo "Your message has been sent!";
            }
          }
        echo "
        
        <form action='send_msg.php?u=$username1' method='POST'>
        <h2>Compose a Message to: ($username1)</h2>
        <input type='text' name='msg_title' size='30' onClick=\"value=''\" value='Enter the message title here ...'><p />
        <textarea cols='50' rows='12' name='msg_body'>Enter the message you wish to send ...</textarea><p />
        <input type='submit' name='submit' value='Send Message'>
        </form>

        ";
        }
        else
        {
         header("Location:profile.php?u=$username");
        }
    }
    }
}
?>
<?php 
include ("include/footer.php");
?>