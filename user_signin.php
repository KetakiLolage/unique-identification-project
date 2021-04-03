<?php
session_start();
$page_title="USER SIGN IN";
require("header.html");


if(isset($_POST["submitted2"]))
 {
  require_once ('connect.php'); 
  $errors = array();
  $e=mysqli_real_escape_string($dbc,trim($_POST["email2"]));
  $p=mysqli_real_escape_string($dbc,trim($_POST["passwd2"]));
  $query="select * from user_info where email='$e' and pass='$p';";
  $rs = @mysqli_query($dbc,$query);
  $num1 = @mysqli_num_rows($rs);
  if ($num1 == 1) 
  {
   $_SESSION["user_login"]=$e;
   $_SESSION["user_pass"]=$p;
   ?>
   <script type="text/javascript">window.alert("You've logged in successfully!"); location.href='viewmy.php';</script>
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
 <li><h4><a href="admin_signin.php">Admin Sign In</a></h4></li>
</ul>
</div>

<div id="content">
<h1> User Sign In </h1>
<form action="user_signin.php" method="post">
<p>Username: <input type="text" name="email2" placeholder="local-part@domain"> </p>
<br />
<p>Password: <input type="password" name="passwd2"> </p>
<br />
<br />
<input type="submit" name="submit2" value="Submit">
<input type="hidden" name="submitted2" value="true">
<br />
<br />
<p><a href="lost_pass.php">Forgot Password?</a></p>
</form>
</div>

<?php
require("footer.html");
?>


