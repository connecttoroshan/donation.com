<?php
session_start();

if(!isset($_SESSION['username']))
  {
    header('location:http://localhost/bca/admin.html');	
  }
  
$value = $_GET['action'];
$id = $_GET['id'];

$con=mysqli_connect('localhost','root','','edonation');

$q="Select * from orglist where id='$id'";
$result=mysqli_query($con,$q);
$data=mysqli_fetch_array($result);
$table_name =$data['name'].$id;

if($value=="Verify")
{
   $q="UPDATE `orglist` SET `verification` = 'verified' WHERE `ID` = '$id'";
   mysqli_query($con,$q);
   mysqli_close($con);  
   header('location:http://localhost/bca/adminhome.php');	
}

if($value=="Delete")
{
	$q="DELETE FROM `orglist` WHERE `ID` = '$id'";
	mysqli_query($con,$q);
	
	$dblink=mysqli_connect('localhost','root','','organisation');
	
	$query="drop table $table_name";
	mysqli_query($dblink,$query);
	
	mysqli_close($con);
	mysqli_close($dblink);
	
	header('location:http://localhost/bca/adminhome.php');	
}
?>