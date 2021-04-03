<?php 
session_start();

/*if (!(isset($_SESSION["user_login"]) && $_SESSION["user_login"] != '')) 
{
 header("Location:mainpage.html");
}*/

$page_title = "User Profile";
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

<div id="content">

<?php
echo "<h1>Your Information</h1>";
require_once ('connect.php'); 
$e=$_SESSION["user_login"];
$p=$_SESSION["user_pass"];
$q = "select * from user_info where email='$e' and pass='$p';";	
$r = @mysqli_query ($dbc, $q); // Run the query.
$myrow = @mysqli_fetch_array ($r);
$file="MES_".$myrow["uid"];
echo "";
echo "<br><h2 style='color:white'>You have been assigned the UID: MES_".$myrow["uid"]."<img  src='uploads/$file.jpg' width='120' height='150' align ='right' alt='$file'></h2>";

echo "<br><br>";
echo "<b>Name: ".$myrow["fname"]." ".$myrow["lname"]."</b>";
echo "<hr>";
echo "<br><b>Birth Date: ".$myrow["bday"]." ".$myrow["bmonth"]." ".$myrow["byear"]."</b>";
echo "<hr>";
echo "<br><b>Email address: ".$myrow["email"]."</b>";
echo "<hr>";
echo "<br><b>Mobile Number: ".$myrow["mob"]."</b>";
echo "<hr>";
echo "<br><b>Gender: ".$myrow["gender"]."</b>";
echo "<hr>";
echo "<br><b>Marital Status: ".$myrow["marital"]."</b>";
echo "<hr>";
echo "<br><b>Address: ".$myrow["address"]."</b>";
echo "<hr>";
echo "<br><b>City: ".$myrow["city"]."</b>";
echo "<hr>";
echo "<br><b>State: ".$myrow["state"]."</b>";
echo "<hr>";
echo "<br><b>Pin Code: ".$myrow["pin"]."</b>";
echo "<hr>";
echo "<br><b>Nationality: ".$myrow["nationality"]."</b>";
echo "<hr>";
echo "<br><b>Blood Group: ".$myrow["bgrp"]."</b>";
echo "<hr>";
echo "<br><b>Physical Disability: ".$myrow["phy"]."</b>";
echo "<hr>";
echo "<br><b>Insurance Number: ".$myrow["insure"]."</b>";
echo "<hr>";
echo "<br><b>Driving Licence Number: ".$myrow["licence"]."</b>";
echo "<hr>";
echo "<br><b>Vehicle Plate Number: ".$myrow["vnum"]."</b>";
echo "<hr>";
echo "<br><b>Qualifications: ".$myrow["qualification"]."</b>";
echo "<hr>";
echo "<br><b>Designation: ".$myrow["occu"]."</b>";
echo "<hr>";
echo "<br><b>Annual Income: ".$myrow["income"]."</b>";
echo "<hr>";
echo "<br><b>Bank Name: ".$myrow["bkname"]."</b>";
echo "<hr>";
echo "<br><b>Account Number: ".$myrow["accNo"]."</b>";
echo "<hr>";
echo "<br><b>Criminal Record: ".$myrow["crime"]."</b>";
echo "<hr>";
echo "<br><b>Crime Details: ".$myrow["cdetails"]."</b>";

include("footer.html");
mysqli_close($dbc);
?>
 
 

