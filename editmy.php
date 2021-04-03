<?php 
session_start();

/*if (!(isset($_SESSION["user_login"]) && $_SESSION["user_login"] != '')) 
{
 header("Location:mainpage.html");
}*/

$page_title = "Edit Profile";
include ("header.html");
require_once ('connect.php');
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


<?php
//display selected fields to be updated
if (isset($_POST['selected']))
{
?>
<div id="content">
<form action="editmy.php" method="post">
<br><br>
<?php if (isset($_POST['ch0'])) { ?>
<p>FIRST NAME: <input type="text" name="fname" size="15" maxlength="30"/><?php echo "<label class=error>$errors[0]</label>"?></p>
<?php } if (isset($_POST['ch1'])) {?>
<p>LAST NAME: <input type="text" name="lname" size="15" maxlength="30"/><?php echo "<label class=error>$errors[1]</label>"?></p>
<?php } if (isset($_POST['ch2'])) {?>
<p>DATE OF BIRTH:
<select name="bday" id="Birthday_Day">
	<option value="-1">Day</option>
	<option value="1">1</option>
	<option value="2">2</option>
	<option value="3">3</option>
	<option value="4">4</option>
	<option value="5">5</option>
	<option value="6">6</option>
	<option value="7">7</option>
	<option value="8">8</option>
	<option value="9">9</option>
	<option value="10">10</option>
	<option value="11">11</option>
	<option value="12">12</option>
	<option value="13">13</option>
	<option value="14">14</option>
	<option value="15">15</option>
	<option value="16">16</option>
	<option value="17">17</option>
	<option value="18">18</option>
	<option value="19">19</option>
	<option value="20">20</option>
	<option value="21">21</option>
	<option value="22">22</option>
	<option value="23">23</option>
	<option value="24">24</option>
	<option value="25">25</option>
	<option value="26">26</option>
	<option value="27">27</option>
	<option value="28">28</option>
	<option value="29">29</option>
	<option value="30">30</option>
	<option value="31">31</option>
</select>
	
<select id="Birthday_Month" name="bmonth">
	<option value="-1">Month</option>
	<option value="January">Jan</option>
	<option value="February">Feb</option>
	<option value="March">Mar</option>
	<option value="April">Apr</option>
	<option value="May">May</option>
	<option value="June">Jun</option>
	<option value="July">Jul</option>
	<option value="August">Aug</option>
	<option value="September">Sep</option>
	<option value="October">Oct</option>
	<option value="November">Nov</option>
	<option value="December">Dec</option>
</select>
						 
<select name="byear" id="Birthday_Year">
	<option value="-1">Year</option>
	<option value="2000">2000</option>
	<option value="1999">1999</option>
	<option value="1998">1998</option>
	<option value="1997">1997</option>
	<option value="1996">1996</option>
	<option value="1995">1995</option>
	<option value="1994">1994</option>
	<option value="1993">1993</option>
	<option value="1992">1992</option>
	<option value="1991">1991</option>
	<option value="1990">1990</option>
	<option value="1989">1989</option>
	<option value="1988">1988</option>
	<option value="1987">1987</option>
	<option value="1986">1986</option>
	<option value="1985">1985</option>
	<option value="1984">1984</option>
	<option value="1983">1983</option>
	<option value="1982">1982</option>
	<option value="1981">1981</option>
	<option value="1980">1980</option>
</select>

<?php echo "<label class=error>$errors[2]</label>"?>

<?php } if (isset($_POST['ch3'])) {?>
<p>MOBILE NUMBER:  <input type="text" name="mob" maxlength="10"/><?php echo "<label class=error>$errors[4]</label>"?></p>

<?php } if (isset($_POST['ch4'])) {?>
<p>GENDER:  Male <input type="radio" name="gender" value="Male" />
   	    Female <input type="radio" name="gender" value="Female" />   <?php echo "<label class=error>$errors[5]</label>"?></p>
	
<?php } if (isset($_POST['ch5'])) {?>
<p>MARITAL STATUS: Single <input type="radio" name="marital" value="Single" />
		   Married <input type="radio" name="marital" value="Married" />   <?php echo "<label class=error>$errors[6]</label>"?></p>
	
<?php } if (isset($_POST['ch6'])) {?>
<p>ADDRESS: <textarea name="address" rows="4" cols="30"></textarea><?php echo "<label class=error>$errors[7]</label>"?></p>

<?php } if (isset($_POST['ch7'])) {?>
<p>CITY: <input type="text" name="city" size="15" maxlength="40"/><?php echo "<label class=error>$errors[8]</label>"?></p>

<?php } if (isset($_POST['ch8'])) {?>
<p>STATE: <input type="text" name="state" size="15" maxlength="40"/><?php echo "<label class=error>$errors[9]</label>"?></p>

<?php } if (isset($_POST['ch9'])) {?>
<p>PINCODE: <input type="text" name="pin" size="15" maxlength="6"/><?php echo "<label class=error>$errors[10]</label>"?></p>
	
<?php } if (isset($_POST['ch10'])) {?>
<p>NATIONALITY: <select name="nationality">
	<option value="-1">-Select-</option>	
	<option value="Indian">Indian</option>
	<option value="NRI">NRI</option>
	<option value="PIO">PIO</option>
	<option value="OCI">OCI</option>
	<option value="Other">Other</option>
</select>
<?php echo "<label class=error>$errors[11]</label>"?>
	</p>

<br><br>
<?php } if (isset($_POST['ch11'])) {?>
<p>BLOOD GROUP:  <select name="bgrp">
	<option value="-1">-Select-</option>
	<option value="A+">A+</option>
	<option value="A-">A-</option>
	<option value="B+">B+</option>
	<option value="B-">B-</option>
	<option value="AB+">AB+</option>
	<option value="AB-">AB-</option>
	<option value="O+">O+</option>
	<option value="O-">O-</option>
</select>
<?php echo "<label class=error>$errors[12]</label>"?>
</p>			 

<?php } if (isset($_POST['ch12'])) {?>
<p>PHYSICALLY DISABLED: Yes<input type="radio" name="phy" value="Yes" />
			No <input type="radio" name="phy" value="No" /><?php echo "<label class=error>$errors[13]</label>"?></p>
						 
<?php } if (isset($_POST['ch13'])) {?>
<p>MEDICAL INSURANCE No.: <input type="text" name="insure" size="15" maxlength="30"/><?php echo "<label class=error>$errors[14]</label>"?></p>

<br>
<?php } if (isset($_POST['ch14'])) {?>
<p>DRIVING LICENSE NUMBER: <input type="text" name="licence" size="15" maxlength="30"/><?php echo "<label class=error>$errors[15]</label>"?></p>

<?php } if (isset($_POST['ch15'])) {?>
<p>VEHICLE NUMBER: <input type="text" name="vnum" size="15" maxlength="30"/><?php echo "<label class=error>$errors[16]</label>"?></p>

<br>
<?php } if (isset($_POST['ch16'])) {?>
<p>QUALIFICATION: <select name="qualification">
	<option value="-1">-Select-</option>
	<option value="SSC/Equivalent certified 10th">SCC/Equivalent certified 10th</option>
	<option value="HSC/Equivalent certified 12th">HSC/Equivalent certified 12th</option>
	<option value="Graduation/Equivalent certified Graduation">Graduation/Equivalent certified Graduation</option>
	<option value="Post-Graduation/Equivalent certified Post-Graduation">Post-Graduation/Equivalent certified Post-Graduation</option>
	<option value="Other">Other</option>
  </select>
 <?php echo "<label class=error>$errors[17]</label>"?>
</p>				  

<?php } if (isset($_POST['ch17'])) {?>
<p>DESIGNATION: Administration <input type="radio" name="occu" value="Administration" />
		Teaching Staff <input type="radio" name="occu" value="Teaching Staff" />
		Library Staff <input type="radio" name="occu" value="Library Staff" />
		<br>Assisting Staff <input type="radio" name="occu" value="Assisting Staff" />
		Student <input type="radio" name="occu" value="Student" /> 		
<?php echo "<label class=error>$errors[18]</label>"?></p>

<?php } if (isset($_POST['ch18'])) {?>
<p>ANNUAL INCOME:  <input type="text" name="income" size="15" maxlength="30"/><?php echo "<label class=error>$errors[19]</label>"?></p>

<?php } if (isset($_POST['ch19'])) {?>
<p>BANK NAME: <select name="bkname">
	<option value="-1">-Select-</option>	
	<option value="State Bank of India">State Bank of India</option>
	<option value="HDFC">HDFC</option>
	<option value="ICICI">ICICI</option>
	<option value="Bank of Baroda">Bank of Baroda</option>
	<option value="Punjab National Bank">Punjab National Bank</option>
	<option value="Saraswat Bank">Saraswat Bank</option>
	<option value="Axis Bank">Axis Bank</option>
	<option value="Union Bank">Union Bank</option>
	<option value="Standard Charted Bank">Standard Charted Bank</option>
	<option value="Oriental Bank of Commerce">Oriental Bank of Commerce</option>
	<option value="Bank of Maharashtra">Bank of Maharashtra</option>
	<option value="Other">Other</option>
</select>
<?php echo "<label class=error>$errors[20]</label>"?>
</p>			  

<?php } if (isset($_POST['ch20'])) {?>
<p>ACCOUNT NUMBER:  <input type="text" name="accNo" size="15" maxlength="30"/><?php echo "<label class=error>$errors[21]</label>"?></p>

<br>
<?php } if (isset($_POST['ch21'])) {?>
<p>CRIMINAL HISTORY: Yes <input type="radio" name="crime" value="Yes" />
	  	     No <input type="radio" name="crime" value="No" />   
<?php echo "<label class=error>$errors[22]</label>"?></p>	

<?php } if (isset($_POST['ch22'])) {?>
<p>CRIME DETAILS:  <textarea name="cdetails" rows="4" cols="30"></textarea><?php echo "<label class=error>$errors[23]</label>"?></p>
<?php } ?>	
<br>

<h2>
<p><input type="submit" name="submit" value="Submit" style="height:25px; width:80px"/>
<input type="reset" name="reset" value="Reset" style="height:25px; width:80px"/></p></h2>
<input type="hidden" name="submitted" value="TRUE" />
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php
}
//update entered values
if (isset($_POST['submitted'])) 
{
 $e=$_SESSION["user_login"];
 $p=$_SESSION["user_pass"];
 $errors = array();
 if (isset($_POST['fname']) && $_POST['fname']!='')
 { 
   $fname = mysqli_real_escape_string($dbc, trim($_POST['fname'])); 
   $q = "update user_info set fname='$fname' where email='$e' AND pass='$p'";
   $r = @mysqli_query ($dbc, $q); 
 }

 if (isset($_POST['lname']) && $_POST['lname']!='')
 { $lname = mysqli_real_escape_string($dbc, trim($_POST['lname'])); 
   $q = "update user_info set lname='$lname' where email='$e' AND pass='$p'";
   $r = @mysqli_query ($dbc, $q); 
 }

 if (isset($_POST['bday']) && $_POST['bday']!=-1 && isset($_POST['bmonth']) && $_POST['bmonth']!=-1 && isset($_POST['byear']) && $_POST['byear']!=-1)
 { $bday = $_POST['bday']; 
   $bmonth = $_POST['bmonth']; 
   $byear = $_POST['byear']; 
   $q = "update user_info set bday='$bday',bmonth='$bmonth',byear='$byear' where email='$e' AND pass='$p'";
   $r = @mysqli_query ($dbc, $q); 
 }

 if (isset($_POST['mob']) && $_POST['mob']!='')
 { $mob = mysqli_real_escape_string($dbc, trim($_POST['mob'])); 
   $q = "update user_info set mob='$mob' where email='$e' AND pass='$p'";
   $r = @mysqli_query ($dbc, $q); 
 }

 if (isset($_POST['gender']))
 {
  $gender=$_POST['gender'];
  $q = "update user_info set gender='$gender' where email='$e' AND pass='$p'";
  $r = @mysqli_query ($dbc, $q); 
 }

 if (isset($_POST['marital']))
 {
  $marital=$_POST['marital'];
  $q = "update user_info set marital='$marital' where email='$e' AND pass='$p'";
  $r = @mysqli_query ($dbc, $q); 
 }

 if (isset($_POST['address']) && $_POST['address']!='')
 { $address = mysqli_real_escape_string($dbc, trim($_POST['address']));	
   $q = "update user_info set address='$address' where email='$e' AND pass='$p'";
   $r = @mysqli_query ($dbc, $q); 
 }

 if (isset($_POST['city']) && $_POST['city']!='')
 { $city = mysqli_real_escape_string($dbc, trim($_POST['city'])); 
   $q = "update user_info set city='$city' where email='$e' AND pass='$p'";
   $r = @mysqli_query ($dbc, $q); 
 }

 if (isset($_POST['state']) && $_POST['state']!='')
 { $state = mysqli_real_escape_string($dbc, trim($_POST['state'])); 
   $q = "update user_info set state='$state' where email='$e' AND pass='$p'";
   $r = @mysqli_query ($dbc, $q); 
 }
	
 if (isset($_POST['pin']) && $_POST['pin']!='')
 { $pin = mysqli_real_escape_string($dbc, trim($_POST['pin'])); 
   $q = "update user_info set pin='$pin' where email='$e' AND pass='$p'";
   $r = @mysqli_query ($dbc, $q); 
 }

 if (isset($_POST['nationality']) && $_POST['nationality']!='')
 { $nationality = mysqli_real_escape_string($dbc, trim($_POST['nationality']));
   $q = "update user_info set nationality='$nationality' where email='$e' AND pass='$p'";
   $r = @mysqli_query ($dbc, $q); 
 }

 if (isset($_POST['bgrp']) && $_POST['bgrp']!=-1)
 { $bgrp = mysqli_real_escape_string($dbc, trim($_POST['bgrp']));
   $q = "update user_info set bgrp='$bgrp' where email='$e' AND pass='$p'";
   $r = @mysqli_query ($dbc, $q); 
 }

 if(isset($_POST['phy']))
 {
  $phy=$_POST['phy'];
  $q = "update user_info set phy='$phy' where email='$e' AND pass='$p'";
  $r = @mysqli_query ($dbc, $q); 
 }

 if (isset($_POST['insure']) && $_POST['insure']!='')
 { $insure = mysqli_real_escape_string($dbc, trim($_POST['insure']));
   $q = "update user_info set insure='$insure' where email='$e' AND pass='$p'";
   $r = @mysqli_query ($dbc, $q); 
 } 

 if (isset($_POST['licence']) && $_POST['licence']!='')
 { $licence = mysqli_real_escape_string($dbc, trim($_POST['licence']));
   $q = "update user_info set licence='$licence' where email='$e' AND pass='$p'";
   $r = @mysqli_query ($dbc, $q); 
 }	

 if (isset($_POST['vnum']) && $_POST['vnum']!='')
 { $vnum = mysqli_real_escape_string($dbc, trim($_POST['vnum']));
   $q = "update user_info set vnum='$vnum' where email='$e' AND pass='$p'";
   $r = @mysqli_query ($dbc, $q); 
 }	

 if (isset($_POST['qualification']) && $_POST['qualification']!=-1)
 { $qualification = $_POST['qualification'];
   $q = "update user_info set qualification='$qualification' where email='$e' AND pass='$p'";
   $r = @mysqli_query ($dbc, $q); 
 }

 if (isset($_POST['occu']))
 { $occu = $_POST['occu'];
   $q = "update user_info set occu='$occu' where email='$e' AND pass='$p'";
   $r = @mysqli_query ($dbc, $q); 
 }

 if (isset($_POST['income']) && $_POST['income']!='')
 { $income = mysqli_real_escape_string($dbc, trim($_POST['income'])); 
   $q = "update user_info set income='$income' where email='$e' AND pass='$p'";
   $r = @mysqli_query ($dbc, $q); 
 } 

 if (isset($_POST['bkname']) && $_POST['bkname']!=-1)
 { $bkname = $_POST['bkname'];
   $q = "update user_info set bkname='$bkname' where email='$e' AND pass='$p'";
   $r = @mysqli_query ($dbc, $q); 
 }

 if (isset($_POST['accNo']) && $_POST['accNo']!='')
 { $accNo = mysqli_real_escape_string($dbc, trim($_POST['accNo']));
   $q = "update user_info set accNo='$accNo' where email='$e' AND pass='$p'";
   $r = @mysqli_query ($dbc, $q); 
 }

 if (isset($_POST['crime']))
 { $crime=$_POST['crime'];
   $q = "update user_info set crime='$crime' where email='$e' AND pass='$p'";
   $r = @mysqli_query ($dbc, $q); 
 }

 if (isset($_POST['cdetails']) && $_POST['cdetails']!='')
 { $cdetails = mysqli_real_escape_string($dbc, trim($_POST['cdetails']));
   $q = "update user_info set cdetails='$cdetails' where email='$e' AND pass='$p'";
   $r = @mysqli_query ($dbc, $q); 
 }
 ?>
 <script type="text/javascript">window.alert("Updation successful!");</script>
 <?php ;
 }	

//display fields for selection
if (!isset($_POST['selected']))
{ ?>
<div id="content">
<form action="editmy.php" method="post">
<h1>Select Fields to Update: </h1>
<br>
<p><input type="checkbox" name="ch0" value="on"> First Name
<input type="checkbox" name="ch1" value="on"> Last Name </p>
<p><input type="checkbox" name="ch2" value="on"> Date of Birth</p>
<p><input type="checkbox" name="ch3" value="on"> Mobile Number</p>
<p><input type="checkbox" name="ch4" value="on"> Marital Status
<input type="checkbox" name="ch5" value="on"> Gender</p>
<p><input type="checkbox" name="ch6" value="on"> Address
<input type="checkbox" name="ch7" value="on"> City
<input type="checkbox" name="ch8" value="on"> State
<input type="checkbox" name="ch9" value="on"> Pin Code</p>
<p><input type="checkbox" name="ch10" value="on"> Nationality</p>
<p><input type="checkbox" name="ch11" value="on"> Blood Group
<input type="checkbox" name="ch12" value="on"> Physical Disability
<input type="checkbox" name="ch13" value="on"> Insurance Number</p>
<p><input type="checkbox" name="ch14" value="on"> License Number
<input type="checkbox" name="ch15" value="on"> Vehicle Number</p>
<p><input type="checkbox" name="ch16" value="on"> Qualification
<input type="checkbox" name="ch17" value="on"> Designation</p>
<p><input type="checkbox" name="ch18" value="on"> Income</p>
<p><input type="checkbox" name="ch19" value="on"> Bank Name
<input type="checkbox" name="ch20" value="on"> Account Number</p>
<p><input type="checkbox" name="ch21" value="on"> Criminal History
<input type="checkbox" name="ch22" value="on"> Crime Details</p>

<br>
<h2><p><input type="submit" name="select" value="Select" style="height:25px; width:80px"/>
<input type="reset" name="reset" value="Reset" style="height:25px; width:80px"/></p></h2>
<input type="hidden" name="selected" value="TRUE" />
</form>

<br><br>
<form action="upload.php" method="POST" enctype="multipart/form-data">
<p>Upload profile picture</p>
<p><input type="file" name="fileToUpload">
<input type="submit" value="Upload" name="submit"></p>
</form>

<div id="parent">
<p style="color:red">See Help</p>
<div id="popup" style="display: none">
<p style="color:lime">*The image name must be your UID<br>*Upload only jpg images.</p>
</div>
</div>
</div>

<script>
var e=document.getElementById('parent');
e.onmouseover=function() {
 document.getElementById('popup').style.display='block';
}
e.onmouseout=function() {
 document.getElementById('popup').style.display='none';
}
</script>


<div id="content">
<br><p><a href="change_pass.php">Change My Password</p>
</div>
<?php
}
include ('footer.html');
?>


