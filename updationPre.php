<?php 
session_start();

if(!isset($_SESSION['username']))
  {
    header('location:http://localhost/bca/orglogin.html');	
  }

$id =$_SESSION['id'];
$value=$_POST['press'];

$con =mysqli_connect('localhost','root','','edonation');

echo $value;
/* ************************* UPDATING Discription *************************************** */
if($value=='Update Discription')
{
   $disc =$_POST['description'];
   $query="UPDATE `orglist` SET `description` = '$disc' WHERE `ID` = '$id'";

    mysqli_query($con,$query);  
}
/* ************************* UPDATING POSTER *************************************** */
if($value=='Update Poster')
{
   $poster =$_FILES['poster'];
   if(file_exists("posters/".$poster['name']))
   {
    echo $poster['name']." already exist with is name plase change the file name and make it unique";
   }	
   else if($poster['size']>"3000000" || $poster['size']<"20000")
   {
    echo "file size not supported please make sure you file size is greater than 20kb and smaller than 3000kb";
	echo "your file size is ".$poster['size']/1000 ."kb";
   }
   else if($poster['type']=="image/jpeg" || $poster['type']=="image/png")
   {
	move_uploaded_file($poster['tmp_name'],"posters/".$poster['name']);
	echo "Your Poster is Successfully Uploaded";
	$banner="posters/".$poster['name'];
	
	$query="UPDATE `orglist` SET `poster` = '$banner' WHERE `ID` = '$id'";
    mysqli_query($con,$query); 
   }
   else 
   {
	echo "file format is not supported, unable to upload";
   }     
}
/* ************************* UPDATING LOGO *************************************** */
if($value=='Update Logo')
{
   $logo =$_FILES['logo'];
   
   if(file_exists("logo/".$logo['name']))
   {
    echo $logo['name']." already exist with is name plase change the file name and make it unique";
   }	
   else if($logo['size']>"700000" || $logo['size']<"10000")
   {
    echo "file size not supported please make sure you file size is greater than 20kb and smaller than 3000kb";
	echo "your file size is ".$poster['size']/1000 ."kb";
   }
   else if($logo['type']=="image/jpeg" || $logo['type']=="image/png")
   {
	move_uploaded_file($logo['tmp_name'],"logo/".$logo['name']);
    echo "Your LOGO is Successfully Uploaded";
	$image="logo/".$logo['name'];
	
	$query="UPDATE `orglist` SET `logo` = '$image' WHERE `ID` = '$id'";
    mysqli_query($con,$query); 
   }
   else 
   {
	echo "file format is not supported, unable to upload";
   }     
}

mysqli_close($con);
?>