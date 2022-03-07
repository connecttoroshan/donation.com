
<?php
 Session_start();

$id     =$_SESSION['ID'];
$dbname =$_SESSION['dbname'];
$con=mysqli_connect('localhost','root','','organisation');
echo $id;
echo $dbname;
$value=$_POST['update'];
echo $value;

	echo "you are in first section";
	
	$head     =$_POST['heading'];
    $details  =$_POST['information'];

    $dblink=mysqli_connect('localhost','root','','organisation');
	
	
    $query="update $dbname SET Heading='$head', Details='$details' where ID='$id'";	
    
	
	mysqli_query($dblink,$query);	
 
 if(isset($_FILES['pictures'])) 
  {
   for($x=0; $x<count($_FILES['pictures']['name']); $x++)
   {
    $name = $_FILES['pictures']['name'][$x];
    $y=$x+1;	
	$image = "image".$y;
	$imagepath="images/".$name;
	
	move_uploaded_file($_FILES['pictures']['tmp_name'][$x],"images/".$name);
	echo "Your Data is Successfully Updated";
	
	$q="update $dbname set $image='$imagepath' where ID='$id'";
	mysqli_query($dblink,$q);
   $_SESSION['message']="Your Data which Heading is '$head', Successfully Updated to Server";
  
    } 	
   }



header('location:http://localhost/bca/edit.php');
?>
