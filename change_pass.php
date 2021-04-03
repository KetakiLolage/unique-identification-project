<?php
session_start();
$page_title = 'Change Password';
include ('header.html');
if (!(isset($_SESSION["admin_login"]) && $_SESSION["admin_login"] != '') && !(isset($_SESSION["user_login"]) && $_SESSION["user_login"] != '')) 
{
 header ("Location:mainpage.html");
}

//for admin
if(isset($_SESSION["admin_login"]))
{
 ?>
 <link rel="stylesheet" href="style.css" type="text/css" media="screen" />
 <div id="navigation1">
 <ul>
 <li><h2><a href="admin.php">Home</a></h2></li>
 <li><h2><a href="signout.php">Sign Out</a></h2></li>
 </ul>
 </div>

 <?php

 if (isset($_POST['submitted'])) 
 {
  require_once ('connect.php');
  $errors = array();
  if (empty($_POST['user'])) 
   $errors[0] = 'You forgot to enter your username.';
  else
  $u = mysqli_real_escape_string($dbc, trim($_POST['user']));
 
  if (empty($_POST['pass'])) 
   $errors[1] = 'You forgot to enter your current password.';
  else 
   $p = mysqli_real_escape_string($dbc, trim($_POST['pass']));

  if (!empty($_POST['pass1'])) 
  {
   if ($_POST['pass1'] != $_POST['pass2']) 
    $errors[3] = 'Your new password did not match the confirmed password.';
   else 
    $np = mysqli_real_escape_string($dbc, trim($_POST['pass1']));
  }
  else
   $errors[2] = 'You forgot to enter your new password.';

  if (empty($errors)) 
  { 
   $q = "select * from admin_login where email_admin='$u' and pass_admin='$p'; ";
   $r = @mysqli_query($dbc, $q);
   $num1=mysqli_affected_rows($dbc);
   if ($num1 == 1) 
   {	
    $q1 = "update admin_login set pass_admin='$np' where email_admin='$u';";		
    $r1 = @mysqli_query($dbc, $q1);
    if (mysqli_affected_rows($dbc) == 1) 
    {
     $_SESSION['user_pass']=$np;
     ?>
     <script type="text/javascript">window.alert("Your password has been changed!");</script>
     <?php ;
    }  
    else 
    {
     ?>
     <script type="text/javascript">window.alert("System Error! Failed to update password.");</script>
     <?php ;
    }
    include ('footer.html'); 
    exit();
   } 
   else 
   {
    echo '<h1>Error!</h1>
    <p class="error">Invalid username and password combination</p>';
   }
  }  
  mysqli_close($dbc);
 }
}

//for user
if(isset($_SESSION["user_login"]))
{
 ?>
 <link rel="stylesheet" href="style1.css" type="text/css" media="screen" />
 <div id="navigation">
 <ul>
 <li><a href="viewmy.php">View My Profile</a></li>
 <li><a href="editmy.php">Edit My Profile</a></li>
 <li><a href="deletemy.php">Delete My Profile</a></li>
 <li><a href="signout.php">Sign Out</a></li>
 </ul>
 </div>
 <?php

 if (isset($_POST['submitted'])) 
 {
  require_once ('connect.php');
  $errors = array();
  if (empty($_POST['user'])) 
   $errors[0] = 'You forgot to enter your username.';
  else
  $u = mysqli_real_escape_string($dbc, trim($_POST['user']));
 
  if (empty($_POST['pass'])) 
   $errors[1] = 'You forgot to enter your current password.';
  else 
   $p = mysqli_real_escape_string($dbc, trim($_POST['pass']));

  if (!empty($_POST['pass1'])) 
  {
   if ($_POST['pass1'] == $_POST['pass']) 
    $errors[2] = 'You cannot enter the same password again.';
   else if ($_POST['pass1'] != $_POST['pass2']) 
    $errors[3] = 'Your new password did not match the confirmed password.';
   else 
    $np = mysqli_real_escape_string($dbc, trim($_POST['pass1']));
  }
  else
   $errors[2] = 'You forgot to enter your new password.';

  if (empty($errors)) 
  { 
   $q = "select * from user_info where email='$u' and pass='$p'; ";
   $r = @mysqli_query($dbc, $q);
   $num1=mysqli_affected_rows($dbc);
   if ($num1 == 1) 
   {	
    $q1 = "update user_info set pass='$np' where email='$u';";		
    $r1 = @mysqli_query($dbc, $q1);
    if (mysqli_affected_rows($dbc) == 1) 
    {
     $_SESSION['user_pass']=$np;
     ?>
     <script type="text/javascript">window.alert("Your password has been changed!");</script>
     <?php ;
    }  
    else 
    {
     ?>
     <script type="text/javascript">window.alert("System Error! Failed to update password.");</script>
     <?php ;
    }
    include ('footer.html'); 
    exit();
   } 
   else 
   {
    echo '<h1>Error!</h1>
    <p class="error">Invalid username and password combination</p>';
   }
  }  
  mysqli_close($dbc);
 }
}
?>

<div id="content">
<h1>Change Your Password</h1>
<form action="change_pass.php" method="post">
<p>Username: <input type="text" name="user" size="20" maxlength="80" placeholder="local-part@domain" value="<?php if (isset($_POST['user'])) echo $_POST['user']; ?>"  /><?php echo "<label class=error>$errors[0]</label>"?></p>
<p>Current Password: <input type="password" name="pass" size="10" maxlength="20" /><?php echo "<label class=error>$errors[1]</label>"?></p>
<p>New Password: <input type="password" name="pass1" size="10" maxlength="20" /><?php echo "<label class=error>$errors[2]</label>"?></p>
<p>Confirm New Password: <input type="password" name="pass2" size="10" maxlength="20" /><?php echo "<label class=error>$errors[3]</label>"?></p><br>
<p><input type="submit" name="submit" value="Change Password" /></p>
<input type="hidden" name="submitted" value="TRUE" />
</form>
</div>
<br><br><br><br><br><br><br><br><br>
<?php
include ('footer.html');
?>
