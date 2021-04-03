<?php 
session_start();

/*if(!(isset($_SESSION["admin_login"]) && $_SESSION["admin_login"] != '')) 
{
 header("Location:mainpage.html");
}*/

$page_title = "Admin: Delete A User";
include ("header.html");
?>

<link rel="stylesheet" href="style.css" type="text/css" media="screen" />
<div id="navigation">
<ul>
<li><a href="reg_by_admin.php">Register A User</a></li>
<li><a href="view.php">View All Profiles</a></li>
<li><a href="chart.php">Statistical Analysis</a></li>
<li><a href="signout.php">Sign Out</a></li>
</ul>
<br>
<br>
</div>

<?php
require_once("connect.php");
if(isset($_POST["submittedd"]))
{
 $e=mysqli_real_escape_string($dbc,trim($_POST["emaila"]));
 $p=mysqli_real_escape_string($dbc,trim($_POST["passwda"]));
 if($_SESSION["admin_login"]==$e && $_SESSION["admin_pass"]==$p)
 { 
  $id=mysqli_real_escape_string($dbc,trim($_POST["uuid"]));
  $query="delete from user_info where uid='$id';";
  $rs = @mysqli_query($dbc,$query);
  ?>
  <script type="text/javascript">window.alert("User Profile Deleted!");</script>
  <?php ;
  }
 else
 {
  ?>
  <script type="text/javascript">window.alert("Admin Authentication failed!");</script>
  <?php ;
 }
} 
mysqli_close($dbc);
?>

<div id="content">
<h1 style="color:yellow">Delete A User</h1>
<form action="delete.php" method="post">
<p>Enter UID of the user to be removed: MES_<input type="text" name="uuid"> </p>
<br><h3 style="color: yellow">ADMIN AUTHENTICATION</h3>
<p>Enter your username: <input type="text" name="emaila"></p>
<p>Enter your password: <input type="password" name="passwda"> </p>
<br><input type="submit" name="submitd" value="Submit">
<input type="hidden" name="submittedd" value="true">
</form>
</div>

<?php
include("footer.html");
?>
