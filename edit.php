<?php
 session_start();
   
 if(!isset($_SESSION['username']))
  {
    header('location:http://localhost/bca/orglogin.html');	
  }
  
  $id=$_SESSION['id'];
  $name=$_SESSION['name']; 
  
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
	
	<img src="logoV.png" alt="icon" >
    </div>
 
  <div id="name">
  
   <h1><?php echo $name;?><span> : Edit your Page Information</span></h1>
  </div>
  
 
   <div id="list">
	<a href="orglogout.php">Logout</a>
	<a href="orghome.php">Home</a>	
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

 <!-- This is Footer part !-->
    
	<footer>
	<div class="footer">
    <div id="contact">
	
	 <a href="contact.html">Contact US</a>
	 <p class="footerpara"><br>You can contact us by e-mail at roshangame0@gmail.com or call on +918700232859, +919560244126.</p>
	</div>
	
	 <div id="logo">
	    <img src="sysicon.png" alt="icon" width="42" height="42">
		<h2>eDonation</h2>
		<br>
		<p>All rights are reserved by eDonation System.</p>
	  </div>
	
	<div id="about">
	 <a href="about.html">About US</a>
	 <p class="footerpara"><br>This is Non-Profitable eDonation system where you can donate people & help them, for more click on the above link.</p>
	</div>
	</div>
	</footer>

</body>
</html>