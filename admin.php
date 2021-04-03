<?php
session_start();

//To prevent admin home page from loading by a session restore
/*if (!(isset($_SESSION["admin_login"]) && $_SESSION["admin_login"] != '')) 
{
 header ("Location:mainpage.html");
}*/

$page_title="Administrator Home";
include("header.html");
?>
<link rel="stylesheet" href="img1.css" type="text/css" media="screen" />
<div id="content">
<h1 style="color:yellow">MANAGE USERS</h1><br>
<ul>
<li><h2><a href="reg_by_admin.php">Register A User</a></h2></li>
<li><h2><a href="delete.php">Delete A Profile</a></h2></li>
<li><h2><a href="view.php">View All Profiles</a></h2></li>
<li><h2><a href="chart.php">Statistical Analysis</a></h2></li>
<li><h2><a href="signout.php">Sign Out</a></h2></li>
</ul>
<br><br><h1 style="color:yellow">MY PROFILE</h1><br>
<ul>
<li><h2><a href="change_pass.php">Change My Password</a></h2></li>
<li><h2><a href="signout.php">Sign Out</a></h2></li>
</ul>
</div>


<?php
include("footer.html");
?>

