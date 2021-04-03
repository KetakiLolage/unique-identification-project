<?php
$target_dir="/var/www/html/uploads/";
$target_file=$target_dir.basename($_FILES["fileToUpload"]["name"]);
$uploadOk=1;
$imageFileType=pathinfo($target_file,PATHINFO_EXTENSION);

//Check if the image is actual or fake
if(isset($_POST["submit"]))
{
 $check=getimagesize($_FILES["fileToUpload"]["tmp_name"]);
 if($check!=false)
  $uploadOk=1;
 else
 {
  ?>
  <script type="text/javascript">window.alert("File is not an image!"); location.href='editmy.php';</script>
  <?php ;
  $uploadOk=0;
 }
}

//Check if $uploadOk was set to 0 by some error
if($uploadOk==0)
 echo "File was not uploaded.";
else
//Upload file
{
 if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],$target_file))
 {?>
 <script type="text/javascript">window.alert("The image was successfully uploaded!"); location.href='editmy.php';</script>
 <?php } 
 else
 { ?>
 <script type="text/javascript">window.alert("Error!"); location.href='editmy.php';</script>
 <?php }  
}
?>
