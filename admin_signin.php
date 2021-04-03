<?php
session_start();
$page_title="ADMIN SIGN IN";
require("header.html");
require_once("connect.php");


 if(isset($_POST["submitted1"]))
 {
  $e=mysqli_real_escape_string($dbc,trim($_POST["email1"]));
  $p=mysqli_real_escape_string($dbc,trim($_POST["passwd1"]));
  $query="select * from admin_login where email_admin='$e' and pass_admin='$p';";
  $rs = @mysqli_query($dbc,$query);
  $num1 = @mysqli_num_rows($rs);
  if ($num1 == 1) 
  {
   $_SESSION["admin_login"]=$e;
   $_SESSION["admin_pass"]=$p;
   ?>
   <script type="text/javascript">window.alert("Welcome Admin"); location.href='admin.php';</script>
   <?php ;
  }
  else
  {
   ?>
   <script type="text/javascript">window.alert("Invalid username or password");</script>
   <?php ;
  }
 }
 
 
mysqli_close($dbc);
?>

<link rel="stylesheet" href="style.css" type="text/css" media="screen" />
<div id="navigation1">
<ul>
 <li><h4><a href="signup.php">Register</a></h4></li>
 <li><h4><a href="user_signin.php">User Sign In</a></h4></li>
</ul>
</div>

<div id="content">
<h1> Admin Sign In </h1>
<form action="admin_signin.php" method="post">
<p>Username: <input type="text" name="email1"> </p>
<br />
<p>Password: <input type="password" name="passwd1"> </p>
<br />
<br />
<input type="submit" name="submit1" value="Submit">
<input type="hidden" name="submitted1" value="true">
</form>
</div>

<?php
require("footer.html");
?>

