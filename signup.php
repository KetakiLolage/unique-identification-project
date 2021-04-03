<?php
session_start();
?>
<link rel="stylesheet" href="style.css" type="text/css" media="screen" />

<?php
if(!(isset($_SESSION["admin_login"]) && $_SESSION["admin_login"] != '')) 
{ 
 $page_title="NEW USER REGISTRATION";
 include_once("header.html");
?>
<div id="navigation1">
<ul>
 <li><h4><a href="user_signin.php">User Sign In</a></h4></li>
 <li><h4><a href="admin_signin.php">Admin Sign In</a></h4></li>
</ul>
</div>
<?php } ?>

<style>
h3 {
 color:yellow;
}
</style>   
<?php
if (isset($_POST['submitted'])) 
{
 require_once ('connect.php');
 $errors = array();
 if (empty($_POST['fname'])) 
 { $errors[0] = 'You forgot to enter your First Name.'; } 
 else 
 { $fname = mysqli_real_escape_string($dbc, trim($_POST['fname'])); }

 if (empty($_POST['lname'])) 
 { $errors[1] = 'You forgot to enter your Last Name.'; } 
 else
 { $lname = mysqli_real_escape_string($dbc, trim($_POST['lname'])); }

 if (strcmp($_POST['bday'],"-1")==0) 
 { $errors[2] = 'You forgot to enter your Date of Birth.'; }
 else
 { $bday = mysqli_real_escape_string($dbc, trim($_POST['bday'])); }

 if (strcmp($_POST['bmonth'],"-1")==0) 
 { $errors[2] = 'You forgot to enter your Date of Birth.'; }
 else 
 { $bmonth = mysqli_real_escape_string($dbc, trim($_POST['bmonth'])); }

 if (strcmp($_POST['byear'],"-1")==0) 
 { $errors[2] = 'You forgot to enter your Date of Birth.'; }
 else 
 { $byear = mysqli_real_escape_string($dbc, trim($_POST['byear'])); }

 if (empty($_POST['email'])) 
 { $errors[3] = 'You forgot to enter your email id.'; }
 else
 { 
   $em = mysqli_real_escape_string($dbc, trim($_POST['email'])); 
   if(!filter_var($em,FILTER_VALIDATE_EMAIL))
    $errors[3]='Incorrect email ID format.';
   else
   {
   $q="select * from user_info where email='$em';";		
   $r = @mysqli_query($dbc,$q); 
   $num = mysqli_num_rows($r);
   if ($num==0) 
    $email=$em;
   else
    $errors[3]='Email ID is already registered to another user!';
   }
 }

 if (!empty($_POST['pass'])) 
 { 
  if ($_POST['pass'] != $_POST['pass1']) 
  { $errors[25] = 'The passwords you have entered do not match.'; } 
  else 
  { $pass = mysqli_real_escape_string($dbc, trim($_POST['pass'])); }
 }
 else 
 { $errors[24] = 'You forgot to enter a password.'; }

 if (empty($_POST['mob'])) 
 { $errors[4] = 'You forgot to enter your mobile number.'; }
 else 
 { $mob = mysqli_real_escape_string($dbc, trim($_POST['mob'])); }

 if(isset($_POST['gender']))
  $gender=$_POST['gender'];
 else 
  $errors[5]='You forgot to select gender';

 if(isset($_POST['marital']))
  $marital=$_POST['marital'];
 else 
  $errors[6]='You forgot to select marital status';

 if (empty($_POST['address'])) 
 { $errors[7] = 'You forgot to enter your address.'; }
 else
 { $address = mysqli_real_escape_string($dbc, trim($_POST['address']));	}

 if (empty($_POST['city'])) 
 { $errors[8] = 'You forgot to enter your city'; }
 else
 { $city = mysqli_real_escape_string($dbc, trim($_POST['city'])); }
	
 if (empty($_POST['state'])) 
 { $errors[9] = 'You forgot to enter your state'; }
 else 
 { $state = mysqli_real_escape_string($dbc, trim($_POST['state'])); }
	
 if (empty($_POST['pin'])) 
 { $errors[10] = 'You forgot to enter your pin'; }
 else 
 { $pin = mysqli_real_escape_string($dbc, trim($_POST['pin'])); }

 if (strcmp($_POST['nationality'],"-1")==0) 
 { $errors[11] = 'You forgot to enter your nationality.'; }
 else
 { $nationality = mysqli_real_escape_string($dbc, trim($_POST['nationality'])); }

 if (strcmp($_POST['bgrp'],"-1")==0) 
 { $errors[12] = 'You forgot to enter your blood group.'; }
 else
 { $bgrp = mysqli_real_escape_string($dbc, trim($_POST['bgrp'])); }

 if(isset($_POST['phy']))
  $phy=$_POST['phy'];
 else 
  $errors[13]='Do you have any Physical Disability?';

 if (empty($_POST['insure'])) 
 { $errors[14] = 'You forgot to enter your health insurance number.'; }
 else 
 { $insure = mysqli_real_escape_string($dbc, trim($_POST['insure'])); } 

 if (empty($_POST['licence'])) 
 { $errors[15] = 'You forgot to enter your vehicle licence number.'; }
 else
 { $licence = mysqli_real_escape_string($dbc, trim($_POST['licence'])); }	

 if (empty($_POST['vnum'])) 
 { $errors[16] = 'You forgot to enter your vehicle number plate.'; } 
 else
 { $vnum = mysqli_real_escape_string($dbc, trim($_POST['vnum'])); }	

 if (strcmp($_POST['qualification'],"-1")==0) 
 { $errors[17] = 'You forgot to enter your qualification.'; } 
 else 
 { $qualification = mysqli_real_escape_string($dbc, trim($_POST['qualification'])); }

 if(isset($_POST['occu']))
  $occu=$_POST['occu'];
 else 
  $errors[18]='You forgot to enter your occupation.';

 if (empty($_POST['income'])) 
 { $errors[19] = 'You forgot to enter your income.'; } 
 else 
 { $income = mysqli_real_escape_string($dbc, trim($_POST['income'])); }

 if (strcmp($_POST['bkname'],"-1")==0) 
 { $errors[20] = 'You forgot to enter your bank name.'; } 
 else 
 { $bkname = mysqli_real_escape_string($dbc, trim($_POST['bkname'])); }

 if (empty($_POST['accNo'])) 
 { $errors[21] = 'You forgot to enter your account number.'; }
 else 
 { $accNo = mysqli_real_escape_string($dbc, trim($_POST['accNo'])); }

 if(isset($_POST['crime']))
  $crime=$_POST['crime'];
 else 
  $errors[22]='Do you have any Criminal History?';

 if (empty($_POST['cdetails'])) 
 { $errors[23] = 'You forgot to enter your crime details.'; } 
 else 
 { $cdetails = mysqli_real_escape_string($dbc, trim($_POST['cdetails'])); }


 if (empty($errors)) 
 { 
  $q = "insert into user_info(fname,lname,bday,bmonth,byear,email,pass,mob,gender,marital,address,city,state,pin,nationality,bgrp,phy,insure,licence,vnum,qualification,occu,income,bkname,accNo,crime,cdetails) values('$fname','$lname','$bday','$bmonth','$byear','$email', '$pass', '$mob','$gender','$marital','$address','$city','$state','$pin','$nationality', '$bgrp', '$phy','$insure','$licence','$vnum','$qualification','$occu','$income','$bkname','$accNo','$crime','$cdetails');";		
  $r = @mysqli_query ($dbc, $q); 
  if ($r) 
  {
   ?>
   <script type="text/javascript">window.alert("Registration successful!"); location.href("signin.php");</script>
   <?php ;
  } 
  else
  {
   ?>
   <script type="text/javascript">window.alert("System Error! Registration failed."); location.href("signup.php");</script>
   <?php ; 
  }	
 } 		
} 
?>

<div id="content">
<form action="signup.php" method="post">
<br />
<h3>Personal Details</h3>
<p>FIRST NAME:<input type="text" name="fname" size="15" maxlength="30" value="<?php if (isset($_POST['fname'])) echo $_POST['fname']; ?>" /><?php echo "<label class=error>$errors[0]</label>"?></p>
<p>LAST NAME:  <input type="text" name="lname" size="15" maxlength="30" value="<?php if (isset($_POST['lname'])) echo $_POST['lname']; ?>" /><?php echo "<label class=error>$errors[1]</label>"?></p>
<p>DATE OF BIRTH:
<select name="bday" id="Birthday_Day" value="<?php if (isset($_POST['bday'])) echo $_POST['bday']; ?>" >
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
	
<select id="Birthday_Month" name="bmonth" value="<?php if (isset($_POST['bmonth'])) echo $_POST['bmonth']; ?>" >
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
						 
<select name="byear" id="Birthday_Year" value="<?php if (isset($_POST['byear'])) echo $_POST['byear']; ?>" >
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
	<option value="1979">1979</option>
	<option value="1978">1978</option>
	<option value="1977">1977</option>
	<option value="1976">1976</option>
	<option value="1975">1975</option>
	<option value="1974">1974</option>
	<option value="1973">1973</option>
	<option value="1972">1972</option>
	<option value="1971">1971</option>
	<option value="1970">1970</option>
	<option value="1969">1969</option>
	<option value="1968">1968</option>
	<option value="1967">1967</option>
	<option value="1966">1966</option>
	<option value="1965">1965</option>
	<option value="1964">1964</option>
	<option value="1963">1963</option>
	<option value="1962">1962</option>
	<option value="1961">1961</option>
	<option value="1960">1960</option>
	<option value="1959">1959</option>
	<option value="1958">1958</option>
	<option value="1957">1957</option>
	<option value="1956">1956</option>
	<option value="1955">1955</option>
	<option value="1954">1954</option>
	<option value="1953">1953</option>
	<option value="1952">1952</option>
	<option value="1951">1951</option>
	<option value="1950">1950</option>
</select>

<?php echo "<label class=error>$errors[2]</label>"?>

<p>EMAIL ID:<input type="text" name="email" size="30" maxlength="100" placeholder="local-part@domain"value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>" /><?php echo "<label class=error>$errors[3]</label>"?></p>	

<div id="parent">
<p style="color:red">See Help</p>
<div id="popup" style="display: none">
<p style="color:lime">Your Email ID will be your unique username. Please enter a valid Email ID.</p>
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
<p>PASSWORD: <input type="password" name="pass" size="10" maxlength="30" value="<?php if (isset($_POST['pass'])) echo $_POST['pass']; ?>" /><?php echo "<label class=error>$errors[24]</label>"?></p>

<p>CONFIRM PASSWORD: <input type="password" name="pass1" size="10" maxlength="20" /><?php echo "<label class=error>$errors[25]</label>"?></p>

<p>MOBILE NUMBER:  <input type="text" name="mob" maxlength="10"  value="<?php if (isset($_POST['mob'])) echo $_POST['mob']; ?>" /><?php echo "<label class=error>$errors[4]</label>"?></p>

<p>GENDER:  Male <input type="radio" name="gender" value="Male" />
   	    Female <input type="radio" name="gender" value="Female" />   <?php echo "<label class=error>$errors[5]</label>"?></p>
	
	
<p>MARITAL STATUS: Single <input type="radio" name="marital" value="Single" />
		   Married <input type="radio" name="marital" value="Married" />   <?php echo "<label class=error>$errors[6]</label>"?></p>
	

<p>ADDRESS: <textarea name="address" rows="4" cols="30" value="<?php if (isset($_POST['address'])) echo $_POST['address']; ?>"></textarea><?php echo "<label class=error>$errors[7]</label>"?></p>

<p>CITY: <input type="text" name="city" size="15" maxlength="40" value="<?php if (isset($_POST['city'])) echo $_POST['city']; ?>" /><?php echo "<label class=error>$errors[8]</label>"?></p>

<p>STATE: <input type="text" name="state" size="15" maxlength="40" value="<?php if (isset($_POST['state'])) echo $_POST['state']; ?>" /><?php echo "<label class=error>$errors[9]</label>"?></p>

<p>PINCODE: <input type="text" name="pin" size="15" maxlength="6" value="<?php if (isset($_POST['pin'])) echo $_POST['pin']; ?>" /><?php echo "<label class=error>$errors[10]</label>"?></p>
	
<p>NATIONALITY: <select name="nationality" value="<?php if (isset($_POST['nationality'])) echo $_POST['nationality']; ?>" >
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
<h3>Medical Records</h3>
<p>BLOOD GROUP:  <select name="bgrp" value="<?php if (isset($_POST['bgrp'])) echo $_POST['bgrp']; ?>" >
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

<p>PHYSICALLY DISABLED: Yes<input type="radio" name="phy" value="Yes" />
			No <input type="radio" name="phy" value="No" />  		 <?php echo "<label class=error>$errors[13]</label>"?></p>
						 

<p>MEDICAL INSURANCE No.: <input type="text" name="insure" size="15" maxlength="30" value="<?php if (isset($_POST['insure'])) echo $_POST['insure']; ?>" /><?php echo "<label class=error>$errors[14]</label>"?></p>

<br>
<h3>Vehicle Records</h3>
<p>DRIVING LICENCE NUMBER: <input type="text" name="licence" size="15" maxlength="30" value="<?php if (isset($_POST['licence'])) echo $_POST['licence']; ?>" /><?php echo "<label class=error>$errors[15]</label>"?></p>

<p>VEHICLE NUMBER: <input type="text" name="vnum" size="15" maxlength="30" value="<?php if (isset($_POST['vnum'])) echo $_POST['vnum']; ?>" /><?php echo "<label class=error>$errors[16]</label>"?></p>

<br>
<h3>Earning and Bank Details</h3>
<p>QUALIFICATION: <select name="qualification" value="<?php if (isset($_POST['qualification'])) echo $_POST['qualification']; ?>" >
	<option value="-1">-Select-</option>
	<option value="SSC/Equivalent certified 10th">SCC/Equivalent certified 10th</option>
	<option value="HSC/Equivalent certified 12th">HSC/Equivalent certified 12th</option>
	<option value="Graduation/Equivalent certified Graduation">Graduation/Equivalent certified Graduation</option>
	<option value="Post-Graduation/Equivalent certified Post-Graduation">Post-Graduation/Equivalent certified Post-Graduation</option>
	<option value="Other">Other</option>
  </select>
 <?php echo "<label class=error>$errors[17]</label>"?>
</p>				  

<p>DESIGNATION: Administration <input type="radio" name="occu" value="Administration" />
		Teaching Staff <input type="radio" name="occu" value="Teaching Staff" />
		Library Staff <input type="radio" name="occu" value="Library Staff" />
		<br>Assisting Staff <input type="radio" name="occu" value="Assisting Staff" />
		Student <input type="radio" name="occu" value="Student" /> 		
<?php echo "<label class=error>$errors[18]</label>"?></p>


<p>ANNUAL INCOME:  <input type="text" name="income" size="15" maxlength="30" value="<?php if (isset($_POST['income'])) echo $_POST['income']; ?>" /><?php echo "<label class=error>$errors[19]</label>"?></p>


<p>BANK NAME: <select name="bkname" value="<?php if (isset($_POST['bkname'])) echo $_POST['bkname']; ?>" >
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

<p>ACCOUNT NUMBER:  <input type="text" name="accNo" size="15" maxlength="30" value="<?php if (isset($_POST['accNo'])) echo $_POST['accNo']; ?>" /><?php echo "<label class=error>$errors[21]</label>"?></p>

<br>
<h3>Criminal Records (if any, type - if none)</h3>
<p>CRIMINAL HISTORY: Yes <input type="radio" name="crime" value="Yes" />
	  	     No <input type="radio" name="crime" value="No" />   
<?php echo "<label class=error>$errors[22]</label>"?></p>	

<p>CRIME DETAILS:  <textarea name="cdetails" rows="4" cols="30" value="<?php if (isset($_POST['cdetails'])) echo $_POST['cdetails']; ?>"></textarea><?php echo "<label class=error>$errors[23]</label>"?></p>
	
<br>

<h2><p><input type="submit" name="submit" value="Submit" style="height:25px; width:80px"/>
<input type="reset" name="reset" value="Reset" style="height:25px; width:80px"/></p></h2>
<input type="hidden" name="submitted" value="TRUE" />
</form>
</div>

<?php
include ('footer.html');
?>
