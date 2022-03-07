
 <?php
 session_start();
   
 if(!isset($_SESSION['username']))
  {
   header('location:http://localhost/bca/orglogin.html');	
  }

$head     =$_POST['heading'];
$details  =$_POST['information'];


$dbname=$_SESSION['name'].$_SESSION['id'];
echo $dbname;
$dblink=mysqli_connect('localhost','root','','organisation');
	
	
$query="insert into $dbname (Heading,Details) values('$head','$details')";	
mysqli_query($dblink,$query);	

$que="select * from $dbname where Heading='$head' && Details='$details'";
$result=mysqli_query($dblink,$que);
$data  =mysqli_fetch_array($result);	
$id=$data['ID'];
echo $id;

   for($x=0; $x<count($_FILES['pictures']['name']); $x++)
   {
    $name = $_FILES['pictures']['name'][$x];
    $y=$x+1;	
	$image = "image".$y;
	$imagepath="images/".$name;
	
	move_uploaded_file($_FILES['pictures']['tmp_name'][$x],"images/".$name);
	echo "Your Data is Successfully Uploaded";
	
	$q="update $dbname set $image='$imagepath' where ID='$id'";
	mysqli_query($dblink,$q);
   $_SESSION['message']="Your Data which Heading is '$head', Successfully Uploaded to Server";
   }	
 

mysqli_close($dblink);

//header('location:http://localhost/bca/orghome.php');
?>