<?php 
session_start();

if(!isset($_SESSION['username']))
  {
    header('location:http://localhost/bca/orglogin.html');	
  }

$_SESSION['id'];  

$_SESSION['ID']=$_POST['update'];
$_SESSION['dbname'];
$_SESSION['name'];
?>


<!DOCTYPE html>
    <head>
    <title>Update Information</title>
   	<link rel="stylesheet" type="text/css" href="update.css">

    </head>
    
	<body>
	
    <!-- Menu!-->
<div id="topbar"> 
    <div id="edonation">  
	
	<img src="logoV.png" alt="icon" >
    </div>
 
  <div id="name">
  
   <h1><?php echo $_SESSION['name'];?></h1>
  </div>
  
 
   <div id="list">
	<a href="orglogout.php">Logout</a>
	<a href="orghome.php">Home</a>
   </div>
</div>


	<!--    Data Updation Section          !-->
	 
	 <h1>From here You can Update the contents that will be show on your Section of main website</h1>
	 
	 <div class="change"><form action="updation.php" method="post" enctype="multipart/form-data">
     <label>Heading:</label><input type="text" id="head" class="fields" name="heading"><br><br>
   
     <label>Information: </label><textarea type="text" class="fields" name="information"></textarea><br><br><br><br><br>
   
     <label>Select Pictures Related to Topic:</label><input type="file" id="pics" class="" name="pictures[]" multiple>
     <input type="submit" value="Save" class="send-button" name="update">
     </form></div>
	
	
	<!--   Update Section for Poster , Logo & Discription   !-->
	<h1>You can Also Change your Logo and Poster from here</h1>
	
	<div class="change">
	<form method="post" action="updationPre.php">
    <label for="description">Brief Description: </label><textarea class="fields" id="text" name="description" 
	  placeholder="Change Brief Description from here about your Organisation"></textarea>
      <input type="submit" value="Update Discription" class="update_buttons" name="press">
	</form>
	 </br></br></br></br>
	
	<form method="post" enctype="multipart/form-data" action="updationPre.php">
    <label for="poster" id="posterL">Organisation Poster: </label><input type="file" name="poster" id="poster">
	<input type="submit" value="Update Poster" class="update_buttons" name="press">
	</form>

</br></br></br></br>
	
	<form method="post" enctype="multipart/form-data" action="updationPre.php">
    <label for="logo">Organisation  Logo :   </label><input type="file" name="logo" id="choose">
	<input type="submit" value="Update Logo" class="update_buttons" name="press">
	</form>
	</div>
	  
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


