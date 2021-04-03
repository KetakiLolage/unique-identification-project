<?php
session_start();
$page_title = 'Poverty Line Chart';
include ('header.html');
require_once('connect.php');

//mysql percentage quering and calculations
$qry1 = "select count(*) from user_info where income >= 17155 group by uid;";
$qry2 = "select count(*) from user_info where income < 17155 group by uid;";
 
$result_1 = mysqli_query($dbc,$qry1);
$result_2 = mysqli_query($dbc,$qry2);

$num_1 = @mysqli_num_rows($result_1);
$num_2 = @mysqli_num_rows($result_2);
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
 ['Income','Population'],
 ['Below Poverty Line',      <?php echo $num_2 ?>],
 ['Above Poverty Line',  <?php echo $num_1 ?>],
 ]);

 // Set chart options
 var options = {'title':'Income Statistics',
 'is3D':true,
 'backgroundColor':'#FFCCFF',
 pieHole: 0.4,
 'width':800,
 'height':500 };

 // Instantiate and draw our chart, passing in some options.
 var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
 chart.draw(data, options);
}
</script>
</head>

<body>
<!--Div that will hold the pie chart-->
<div id="chart_div"></div>
</body>

<?php
include("footer.html");
?>
