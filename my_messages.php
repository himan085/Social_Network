<?php
include ("include/header.php");
?>
<h2>My Unread Messages:</h2><p />
<?php
//Grab the messages for the logged in user
$grab_messages = mysql_query("SELECT * FROM pvt_messages WHERE user_to='$username' && opened='no' && deleted='no'");
$numrows = mysql_numrows($grab_messages);
if ($numrows != 0) {
while ($get_msg = mysql_fetch_assoc($grab_messages)) {
      $id = $get_msg['id']; 
      $user_from = $get_msg['user_from'];
      $user_to = $get_msg['user_to'];
      $msg_title = $get_msg['msg_title'];
      $msg_body = $get_msg['msg_body'];
      $date = $get_msg['date'];
      $opened = $get_msg['opened'];
      $deleted = $get_msg['deleted'];
      ?>
      <script language="javascript">
         function toggle<?php echo $id; ?>() {
           var ele = document.getElementById("toggleText<?php echo $id; ?>");
           var text = document.getElementById("displayText<?php echo $id; ?>");
           if (ele.style.display == "block") {
              ele.style.display = "none";
           }
           else
           {
             ele.style.display = "block";
           }
         }
</script>
      <?php

      if (strlen($msg_title) > 50) {
       $msg_title = substr($msg_title, 0, 50)." ...";
      }
      else
      $msg_title = $msg_title;
      
      if (strlen($msg_body) > 150) {
       $msg_body = substr($msg_body, 0, 150)." ...";
      }
      else
      $msg_body = $msg_body;
      
      if (@$_POST['setopened_' . $id . '']) {
       //Update the private messages table
       $setopened_query = mysql_query("UPDATE pvt_messages SET opened='yes' WHERE id='$id'");
      }

      echo "
      <form method='POST' action='my_messages.php' name='$msg_title'>
      <b><a href='profile.php?u=$user_from'>$user_from</a></b>
      <input type='button' name='openmsg' value='$msg_title' onClick='javascript:toggle$id()'>
      <input type='submit' name='setopened_$id' value=\"I've Read This\">
      </form>
      <div id='toggleText$id' style='display: none;'>
      <br />$msg_body
      </div>
      <hr /><br />
      ";
}
}
else
{
 echo "You haven't read any messages yet.";
}
?>
<h2>My Read Messages:</h2><p />
<?php
//Grab the messages for the logged in user
$grab_messages = mysql_query("SELECT * FROM pvt_messages WHERE user_to='$username' && opened='yes' && deleted='no'");
$numrows_read = mysql_numrows($grab_messages);
if ($numrows_read != 0) {
while ($get_msg = mysql_fetch_assoc($grab_messages)) {
      $id = $get_msg['id'];
      $user_from = $get_msg['user_from'];
      $user_to = $get_msg['user_to'];
      $msg_title = $get_msg['msg_title'];
      $msg_body = $get_msg['msg_body'];
      $date = $get_msg['date'];
      $opened = $get_msg['opened'];
      $deleted = $get_msg['deleted'];
      ?>
        <script language="javascript">
         function toggle<? echo $id; ?>() {
           var ele = document.getElementById("toggleText<?php echo $id; ?>");
           var text = document.getElementById("displayText<?php echo $id; ?>");
           if (ele.style.display == "block") {
              ele.style.display = "none";
           }
           else
           {
             ele.style.display = "block";
           }
         }
</script>
      <?php
      
      if (strlen($msg_title) > 50) {
       $msg_title = substr($msg_title, 0, 50)." ...";
      }
      else
      $msg_title = $msg_title;
      
      if (strlen($msg_body) > 150) {
       $msg_body = substr($msg_body, 0, 150)." ...";
      }
      else
      $msg_body = $msg_body;
      
      if (@$_POST['delete_' . $id . '']) {
       $delete_msg_query = mysql_query("UPDATE pvt_messages SET deleted='yes' WHERE id='$id'");
      }
      if (@$_POST['reply_' . $id . '']) {
       echo "<meta http-equiv=\"refresh\" content=\"0; url=msg_reply.php?u=$user_from\">";
      }

      echo "      <form method='POST' action='my_messages.php' name='$msg_title'>
      <b><a href='profile.php?u=$user_from'>$user_from</a></b>
      <input type='button' name='openmsg' value='$msg_title' onClick='javascript:toggle$id()'>
      <input type='submit' name='delete_$id' value=\"X\" title='Delete Message'>
      <input type='submit' name='reply_$id' value=\"Reply\">
      </form>
      <div id='toggleText$id' style='display: none;'>
      <br />$msg_body
      </div>
      <hr /><br />";
}
}
else
{
 echo "You haven't read any messages yet.";
}
?>
<?php 
include ("include/footer.php");
?>