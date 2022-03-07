<?php
  session_start();

$dbname =$_SESSION['dbname'];
$con=mysqli_connect('localhost','root','','organisation');

	$id= $_POST['idnumber'];

	$q="delete from $dbname where ID='$id'";
	mysqli_query($con,$q);
    header('location:http://localhost/bca/edit.php');	


mysqli_close($con);

?>