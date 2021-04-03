<?php
session_start();
$page_title = 'Educational Qualification Statistics';
include ('header.html');
require_once ('connect.php'); 

$qry1 = "select count(*) from user_info where qualification = 'SSC/Equivalent certified 10th' group by uid;";
$qry2 = "select count(*) from user_info where qualification = 'HSC/Equivalent certified 12th' group by uid;";
$qry3 = "select count(*) from user_info where qualification = 'Graduation/Equivalent certified Graduation' group by uid;";
$qry4 = "select count(*) from user_info where qualification = 'Post-Graduation/Equivalent certified Post-Graduation' group by uid";
 
$result_1 = mysqli_query($dbc,$qry1);
$result_2 = mysqli_query($dbc,$qry2);
$result_3 = mysqli_query($dbc,$qry3);
$result_4 = mysqli_query($dbc,$qry4);

$num_1 = @mysqli_num_rows($result_1);
$num_2 = @mysqli_num_rows($result_2);
$num_3 = @mysqli_num_rows($result_3);
$num_4 = @mysqli_num_rows($result_4);
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
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript">
google.load('visualization', '1.0', {'packages':['corechart']});
google.setOnLoadCallback(drawChart);
function drawChart() 
{
 var data = new google.visualization.DataTable();
 data.addColumn('string', 'Educational Qualification');
 data.addColumn('number', 'Population');
 data.addRows([
  ['SSC/Equivalent 10th', <?php echo $num_1 ?>],
  ['HSC/Equivalent 12th', <?php echo $num_2 ?>],
  ['Graduation', <?php echo $num_3 ?>],
  ['Post-Graduation', <?php echo $num_4 ?>],
 ]);

 var options = {'title':'Educational Qualification Statistics',
                'is3D':true,
                'backgroundColor':'#FFCCFF',
                'width':800,
                'height':500};
 var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
 chart.draw(data, options);
}
</script>
</head>

<body>
<div id="chart_div"></div>
</body>

<?php
mysqli_close($dbc);
include ('footer.html');
?>
