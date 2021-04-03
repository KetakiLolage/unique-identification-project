<?php
session_start();

/*if (!(isset($_SESSION['varname1']) && $_SESSION['varname1'] != '')) {

header ("Location: index.php");
}*/

$page_title = 'Statistical Analysis';
include ('header.html');
?>
<link rel="stylesheet" href="style.css" type="text/css" media="screen" />
<div id="navigation">
<ul>
<li><a href="reg_by_admin.php">Register A User</a></li>
<li><a href="delete.php">Delete A Profile</a></li>
<li><a href="view.php">View All Users</a></li>
<li><a href="signout.php">Sign Out</a></li>
</ul>
<br><br>
</div>

<div id="content">
<br><br>
<h1>Which chart would you like to study?</h1>
<br><br>

<ul>
<li><h2><a href="chart_gender.php">Sex Ratio</a></h2></li><br>
<li><h2><a href="chart_crime.php">Crime Statistics</a></h2></li><br>
<li><h2><a href="chart_poverty.php">Poverty Line</a></h2></li><br>
<li><h2><a href="chart_qualification.php">Educational Qualification Statistics</a></h2></li><br>
</ul>	
<br><br>

<?php
include ('footer.html');
?>
