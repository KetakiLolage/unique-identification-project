<?php 
session_start();

/*if (!(isset($_SESSION["admin_login"]) && $_SESSION["admin_login"] != '')) 
{
 header("Location:mainpage.html");
}*/

$page_title = "Admin: View Users";
include ("header.html");
?>

<style>
h3 {
color:yellow;
}
</style>


<div id="navigation">
<ul>
<li><a href="reg_by_admin.php">Register A User</a></li>
<li><a href="delete.php">Delete A Profile</a></li>
<li><a href="chart.php">Statistical Analysis</a></li>
<li><a href="signout.php">Sign Out</a></li>
</ul>
</div>


<h1>Registered Users</h1>

<div id="content">

<?php
require_once("connect.php");

$q = "select uid,fname,lname,email from user_info;";		
$r = @mysqli_query($dbc,$q); 
$num = mysqli_num_rows($r);

if ($num!=0) 
{ 
 echo "<h3><p>There are currently $num registered users.</p></h3>";
}
else
{ 
 echo '<h3><p class="error">There are currently no registered users.</p></h3>';
}

function totable($r)
{
 echo "<br><br>";
 echo"<table border=10 cellpadding=5 cellspacing=15 bgcolor=yellow>";
 echo "<tr>";
 for($i = 0; $i < mysqli_num_fields($r); $i++) 
 {
  $field_info = mysqli_fetch_field($r);
  echo "<th>{$field_info->name}</th>";
 }
 while($row = mysqli_fetch_row($r)) 
 {
  echo "<tr>";
  foreach($row as $_column) 
  {
   echo "<td>{$_column}</td>";
  }
  echo "</tr>";
 }
 echo "</table>";
}

totable($r);

include("footer.html");
?>
