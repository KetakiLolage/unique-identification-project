<?php
session_start();
$page_title="Forgot Password";
include("header.html");

?>

<link rel="stylesheet" href="style.css" type="text/css" media="screen" />
<div id="navigation">
<ul>
 <li><h4><a href="signup.php">Register</a></h4></li>
 <li><h4><a href="user_signin.php">User Sign In</a></h4></li>
 <li><h4><a href="admin_signin.php">Admin Sign In</a></h4></li>
</ul>
</div>

<link rel="stylesheet" href="style1.css" type="text/css" media="screen" />
<body>
<div id="content">
<?php
if(isset($_POST['submitted']))
{
 require_once("connect.php");
 $u=mysqli_real_escape_string($dbc,trim($_POST["user"]));
 $query="select * from user_info where email='$u';";
 $rs = @mysqli_query($dbc,$query);
 $num1 = @mysqli_num_rows($rs);
 if ($num1 == 1) 
 {
  $str="";
  $characters=array_merge(range('A','Z'),range('a','z'),range('0','9'));
  $max=count($characters)-1;
  for($i=0;$i<10;$i++)
  {
   $rand=mt_rand(0,$max);
   $str.=$characters[$rand];
  }
  $query="update user_info set pass='$str' where email='$u';";
  $rs = @mysqli_query($dbc,$query);
  echo "<br><br><p>Your temporary password is: &nbsp $str </p><br>";
  echo "<p>We recommend that you change your password the next time you sign in.</p>";
 }
}
else
{
?>

<form action="lost_pass.php" method="POST">
<br><br><br><p>Enter your username: <input type="text" name="user"> </p>
<br><input type="submit" name="submit" value="Submit">
<input type="hidden" name="submitted" value="true">
</form>
</div>
</body>

<?php
}
include("footer.html");
?>
