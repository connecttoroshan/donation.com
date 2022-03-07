<?php session_start();

 if(!isset($_SESSION['username']))
  {
    header('location:http://localhost/bca/userlogin.html');	
  }
  
  
 $connect=mysqli_connect('localhost','root','','edonation');
   
   $q="select * from orglist where verification='verified'";
 
   $data=mysqli_query($connect,$q);
   
   $row=mysqli_num_rows($data);
 
   mysqli_close($connect);
  
  
 ?> 
 


<!DOCTYPE html>
<html>
 <head>
 <title>Home</title>
 
 <link rel="stylesheet" type="text/css" href="home.css">

    
 </head> 
 

 <body>

	<nav class="menu" id="menu">
      
	  <div class="logo">
	    <img src="sysicon.png" alt="icon" width="42" height="42">
		<h2>eDonation</h2>
	  </div>
	  <a href="userlogout.php" id="logout">Logout <?php echo $_SESSION['username']; ?> </a> 
	  <ul>
		 <li id="active"><a href="" >Organisations List</a></li>
         <li><a href="donationlist.php">Your Donations</a></li>
		 <li><a href="contact.html">Contact</a></li>
         <li><a href="about.html">About</a></li>
      </ul>
	  
    </nav>
	
<div id="banner"> <h1></h1></div>


<?php 

for($i=1;$i<=$row;$i++)
 {	 
   $result=mysqli_fetch_array($data);
?>

<form method="get" action="orgshowpage.php">
<input type="hidden" value="<?php echo $result['ID']?>" name="id">
<div class="box">


    <div><img src="<?php echo $result['logo']; ?>" alt="image" class="poster"></div>
 
   <div class="para">
   <input type="submit" value="<?php echo $result['name'];?>" class="h3">
   <p><?php echo $result['description'];?></p>
   </div>

  <input type="submit" formaction="payment.php" value="Donate" class="donate">
 
 </div>
</form>

<?php
 } 
?> 

   <br><br>



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
