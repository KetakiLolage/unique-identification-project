<?php
session_start();
$page_title = 'Crime Statistics';
include ('header.html');
require_once ('connect.php'); 

//mysql percentage male/female quering and calculations
$qry1 = "select count(*) from user_info where crime = 'Yes' AND gender='male' group by uid;";
$qry2 = "select count(*) from user_info where crime = 'No' AND gender='male' group by uid;";
$qry3 = "select count(*) from user_info where crime = 'Yes' AND gender='female' group by uid;";
$qry4 = "select count(*) from user_info where crime = 'No' AND gender='female' group by uid;";
 
$result_cm = mysqli_query($dbc,$qry1);
$result_nm = mysqli_query($dbc,$qry2);
$result_cf = mysqli_query($dbc,$qry3);
$result_nf = mysqli_query($dbc,$qry4);

$num_cm = @mysqli_num_rows($result_cm);
$num_nm = @mysqli_num_rows($result_nm);
$num_cf = @mysqli_num_rows($result_cf);
$num_nf = @mysqli_num_rows($result_nf);
?>

<div id="navigation2">
<ul>
<li><h4><a href="admin.php">Home</a></h4></li>
<li><h4><a href="chart.php">Back</a></h4></li>
<li><h4><a href="signout.php">Signout</a></h4></li>
</ul>
</div>

<div id="content">
<br><br>

<!--Load the AJAX API-->
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript">

// Load the Visualization API and the piechart package.
// Parameters: moduleName,moduleVersion,optionalSettings
google.load('visualization', '1.0', {'packages':['corechart']});

// Set a callback to run when the Google Visualization API is loaded.
google.setOnLoadCallback(drawChart);

// Callback that creates and populates a data table,
// instantiates the pie chart, passes in the data and
// draws it.
function drawChart() 
{
 //Create the data table
 var data = google.visualization.arrayToDataTable([
 ['Criminals','Non-Criminals'],
 ['Male Criminals',      <?php echo $num_cm ?>],
 ['Male Non-Criminals',  <?php echo $num_nm ?>],
 ['Female Criminals',    <?php echo $num_cf ?>],
 ['Female Non-Criminals',<?php echo $num_nf ?>]
 ]);

 // Set chart options
 var options = {'title':'Crime Stats',
 'is3D':true,
 'backgroundColor':'#FFCCFF',
 pieHole: 0.4,
 'width':800,
 'height':500 };

 // Instantiate and draw our chart, passing in some options.
 var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
 chart.draw(data, options);
}
</script>
</head>

<body>
<!--Div that will hold the pie chart-->
<div id="chart_div"></div>
</body>

<?php
mysqli_close($dbc);
include ('footer.html');
?>
