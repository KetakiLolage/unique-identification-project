<?php 
session_start();

/*if(!(isset($_SESSION["user_login"]) && $_SESSION["user_login"] != '')) 
{
 header("Location:mainpage.html");
}*/

$page_title = "Delete My Profile";
include ("header.html");
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
require_once("connect.php");
if(isset($_POST["submittedd"]))
{
 $e=mysqli_real_escape_string($dbc,trim($_POST["emailu"]));
 $p=mysqli_real_escape_string($dbc,trim($_POST["passwdu"]));
 
 if($_SESSION["user_login"]==$e && $_SESSION["user_pass"]==$p)
 { 
  $query="delete from user_info where email='$e' and pass='$p';";
  $rs = @mysqli_query($dbc,$query);
  ?>
  <script type="text/javascript">window.alert("User Profile Deleted!");location.href='mainpage.html';</script>
  <?php ;
  }
 else
 {
  ?>
  <script type="text/javascript">window.alert("User Authentication failed!");</script>
  <?php ;
 }
} 
mysqli_close($dbc);
?>

<div id="deletemy">
<div id="content">
<form action="deletemy.php" method="post">
<br>
<br>
<br>
<h3 style="color:yellow">USER AUTHENTICATION</h3>
<p>Enter your username: <input type="text" name="emailu"></p>
<p>Enter your password: <input type="password" name="passwdu"> </p>
<br>
<br>
<input type="submit" name="submitd" value="Submit">
<input type="hidden" name="submittedd" value="true">
</form>
</div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</div>

<?php
include("footer.html");
?>

