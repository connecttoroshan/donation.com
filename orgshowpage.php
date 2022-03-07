<?php
session_start();

 $id=$_GET['id'];

 
 $con=mysqli_connect('localhost','root','','edonation');
   
   $q="select * from orglist where id='$id'";
 
   $data=mysqli_query($con,$q);
   $result=mysqli_fetch_array($data);
 
//this is accessing organisation database
$dbname=$result['name'].$id;
 
$dblink=mysqli_connect('localhost','root','','organisation');
$que="select * from $dbname";

$result2=mysqli_query($dblink,$que);

$row=mysqli_num_rows($result2);

 mysqli_close($dblink);
 mysqli_close($con);
?>

<!Doctype html>
<html>
<head>
<title>eDonation || <?php echo $result['name'];?></title>
<link rel="stylesheet" type="text/css" href="orgshowpage.css">

<style type="text/css">


</style>

</head>
<body>

<div id="orgname"> 
    <div id="edonation">  
	<a href="home.php"><img src="logoV.png" alt="icon" ></a>
	
    </div>
 
  <div id="name">
   <h1><?php echo $result['name'];?></h1>
  </div>
</div>

<div id="orgposter"><img src="<?php echo $result['poster'];?>" alt="poster"></div>

<!-- THIS IS INTRO PART !-->
<form method="get" action="orgshowpage.php">
<input type="hidden" value="<?php echo $result['ID']?>" name="id">
 <div class="box">
 <div><img src="<?php echo $result['logo']; ?>" alt="image" class="poster"></div>
 
   <div class="para">
   <p><?php echo $result['description'];?></p>
   </div>
 <input type="submit" formaction="payment.php" value="Donate" class="donate">
 </div>
</form>

<?php 

for($i=1;$i<=$row;$i++)
 {	 
   $orgdata=mysqli_fetch_array($result2);
?>

<div id="aboutorg">
 <h1 id="detailhead"><?php echo $orgdata['Heading'];?></h1>
 <p id="detailpara"><?php echo $orgdata['Details'];?></p>
 
 <div id="pictures">
    <div > <img src="<?php echo $orgdata['Image1'];?>"   alt="image" class="images" > </div> 
    <div > <img src="<?php echo $orgdata['Image2'];?>"   alt="image" class="images" > </div> 
    <div > <img src="<?php echo $orgdata['Image3'];?>"   alt="image" class="images"> </div> 
    <div > <img src="<?php echo $orgdata['Image4'];?>"   alt="image" class="images" > </div>
 </div>
</div>

<?php
 } 
?> 


<!-- This is Footer part !-->
    
	<footer>
	
	<div class="footer">
     
	 
	 
	 <div id="fcontact">
	 
	 <a href="contact.html">Contact US</a>
	 <p class="footerpara"><br>You can contact us by e-mail at roshangame0@gmail.com or call on +918700232859, +919560244126.</p>
	</div>
	
	
	 <div id="flogo">
	   <a href="home.php"> <img src="logoV.png" alt="icon" width="42" height="42"></a>
		<br>
		<p>All rights are reserved by eDonation System.</p>
		<br>
	  </div>
	  
	
	<div id="fabout">
	 <a href="about.html">About US</a>
	 <p class="footerpara"><br>This is Non-Profitable eDonation system where you can donate people & help them, for more click on the above link.</p>
	</div>
	
	</div>
	
	</footer>


</body>
</html>