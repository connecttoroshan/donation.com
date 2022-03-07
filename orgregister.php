<?php

$name   =$_POST['orgname'];
$desc   =$_POST['description'];
$logo   =$_FILES['logo'];
$poster =$_FILES['poster'];

$accno  =$_POST['accno'];

$user=$_POST['username'];
$pass=$_POST['password'];

//********************* UPLOADING POSTER *********************

if(file_exists("posters/".$poster['name']))
{
 echo $poster['name']." already exist with is name plase change the file name and make it unique";
}	
else if($poster['size']>"3000000" || $poster['size']<"20000")
{
    echo "Poster size not supported please make sure you file size is greater than 20kb and smaller than 3000kb ";
	echo "your file size is ".$poster['size']/1000 ."kb";
}
else if($poster['type']=="image/jpeg" || $poster['type']=="image/png")
{
	 move_uploaded_file($poster['tmp_name'],"posters/".$poster['name']);
	 echo "Your Poster is Successfully Uploaded";
	 $banner="posters/".$poster['name'];
}
 else 
 {
	echo "file format is not supported, unable to upload";
 } 
//************************************************************************



//********************** UPLOADING LOGO *********************
if(file_exists("logo/".$logo['name']))
{
 echo $logo['name']." already exist with is name plase change the file name and make it unique";
}	
else if($logo['size']>"700000" || $logo['size']<"5000")
{
    echo "Logo size not supported please make sure you file size is greater than 5kb and smaller than 700kb";
	echo "your file size is ".$logo['size']/1000 ."kb";
}
else if($logo['type']=="image/jpeg" || $logo['type']=="image/png")
{
	move_uploaded_file($logo['tmp_name'],"logo/".$logo['name']);
    echo "Your LOGO is Successfully Uploaded";
	$image="logo/".$logo['name'];


	$connect=mysqli_connect('localhost','root','','edonation');
    $q="insert into orglist (name,description,logo,poster,username,password,account_no) values ('$name','$desc','$image','$banner','$user','$pass','$accno')";
    mysqli_query($connect,$q);
}
 else 
 {
	echo "file format is not supported, unable to upload";
 }
 
 $ret="select id from orglist where name='$name'";
 $result=mysqli_query($connect,$ret);

 $id=mysqli_fetch_array($result);
	
	
	$dbname=$name.$id['id'];
	
	
	$con2=mysqli_connect('localhost','root','','organisation');
  
  $q="CREATE TABLE $dbname
  ( ID int(10) NOT NULL AUTO_INCREMENT,
    Heading varchar(255),
    Details text,
    Image1 varchar(255),
	Image2 varchar(255),
	Image3 varchar(255),
	Image4 varchar(255),
    PRIMARY KEY (ID) )";

    mysqli_query($con2,$q);
    mysqli_close($con2);
	mysqli_close($connect);
 header("Refresh:5; url=http://localhost/bca/orglogin.html");	
 
?>






