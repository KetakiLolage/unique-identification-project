<?php 
session_start();

/*if(!(isset($_SESSION["admin_login"]) && $_SESSION["admin_login"] != '')) 
{
 header("Location:mainpage.html");
}*/

$page_title = "Register A User";
include ("header.html");
?>
<link rel="stylesheet" href="style.css" type="text/css" media="screen" />
<div id="navigation">
<ul>
<li><a href="delete.php">Delete A Profile</a></li>
<li><a href="view.php">View All Profiles</a></li>
<li><a href="chart.php">Statistical Analysis</a></li>
<li><a href="signout.php">Sign Out</a></li>
</ul>
<br><br>
</div>

<div id="content">
<h1 style="color:yellow">Register A User</h1>
</div>

<?php
require("signup.php");
include("footer.html");
?>
