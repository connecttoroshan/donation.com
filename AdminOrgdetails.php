<?php
 session_start();
   
 if(!isset($_SESSION['username']))
  {
    header('location:http://localhost/bca/admin.html');	
  }
  
  $id=$_GET['id'];

   $connect=mysqli_connect('localhost','root','','edonation');
   $q="select * from orglist where id='$id'";
   $data=mysqli_query($connect,$q);
   $result=mysqli_fetch_array($data);
   $name=$result['name'];
  
  
  $table_name=$name.$id;
  
 
  
  $_SESSION['dbname']=$table_name;
  $connect=mysqli_connect('localhost','root','','organisation');
  
  $query="select * from $table_name";
  
  $data=mysqli_query($connect,$query);
  
  mysqli_close($connect);

 $row=mysqli_num_rows($data);

?>

<!DOCTYPE html>
<html>
<head>
<title>Edit Information</title>
<link rel="stylesheet" type="text/css" href="edit.css">
</head>
<body>

<div id="orgname"> 
    <div id="edonation">  
	
	<a href="adminhome.php"><img src="logoV.png" alt="icon" ></a>
    </div>
 
  <div id="name">
  
   <h1><?php echo $name;?><span> : Edit your Page Information</span></h1>
  </div>
  
 
   <div id="list">
	<a href="adminlogout.php">Admin Logout</a>
   </div>
</div>

<?php 

for($i=1;$i<=$row;$i++)
 {	 
   $orgdata=mysqli_fetch_array($data);
?>
<form method="POST">
<div id="aboutorg">
 <h1 id="detailhead" style="text-align:center"><?php echo $orgdata['Heading'];?></h1>
 <p id="detailpara" ><?php echo $orgdata['Details'];?></p>
 
 <div id="pictures">
    <div > <img src="<?php echo $orgdata['Image1'];?>"   alt="image" class="images" > </div> 
    <div > <img src="<?php echo $orgdata['Image2'];?>"   alt="image" class="images" > </div> 
    <div > <img src="<?php echo $orgdata['Image3'];?>"   alt="image" class="images"> </div> 
    <div > <img src="<?php echo $orgdata['Image4'];?>"   alt="image" class="images" > </div>
	
	<div> <button formaction="update.php" name="update" value="<?php echo $orgdata['ID'];?>">Edit</button></div>
	<div> <button formaction="deletion.php" value="<?php echo $orgdata['ID'];?>" name="idnumber">Delete</button></div>

 </div>
</div>
</form>
<?php
 } 
?> 

 

</body>
</html>