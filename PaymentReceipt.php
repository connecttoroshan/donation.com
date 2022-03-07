<?php
 session_start();


 if(!isset($_SESSION['username']))
  {
    header('location:http://localhost/bca/userlogin.html');	
  }
 
$_SESSION['amount'];
$_SESSION['orgname'];
$_SESSION['logo'];

$con=mysqli_connect('localhost','root','','edonation');
$username=$_SESSION['username'];
$q="select * from user where username='$username'";
$result=mysqli_query($con,$q);
$data=mysqli_fetch_array($result);
$date=date("Y-m-d h:i a");


if(isset($_SESSION['entry']))
{
    $q="Insert into receipt(username,orgname,orglogo,date,name,phone,email,amount)VALUES('$username','$_SESSION[orgname]','$_SESSION[logo]','$date','$data[name]','$data[phone]','$data[email]','$_SESSION[amount]')";
	mysqli_query($con,$q);
}


?> 

<!DOCTYPE html>
<html>
 <head>
 <title>Donation Receipt</title>
 <link rel="stylesheet" type="text/css" href="PaymentReceipt.css">
</head> 

<body>

<nav class="menu" id="menu">
      
	  <div class="logo">
	  <img src="logoH.png" alt="icon">
		
	  </div>
	  <a href="userlogout.php" id="logout">Logout <?php echo $_SESSION['username']; ?> </a> 
	  <ul>
		 <li ><a href="home.php" >Home</a></li>
         
      </ul>
	  
</nav>
	
	
<div id="back">
<div id="page">

<div id="div1">
 <div id="div1a"><p>Date & Time: <?php echo $date ;?></p></div>
 <div id="div1b"><h2>Donation Receipt </h2></div>
</div>

<div id="div2">
 <img src="logoV.png">
 <h2>Thankyou For Supporting Us  <?php echo $data['name'];?> </h2>
</div>

<div id="div3">
 
 <div id="div3a"> 
  <p>Donor's name   : <?php echo $data['name'];?></p>
  <p>Donor's Phone  : <?php echo $data['phone'];?></p>
  <p>Donor's E-mail : <?php echo $data['email'];?></p>
 </div>
 
 <div id="div3b">
    <img src=" <?php echo $_SESSION['logo'];?>" id="img">
    <p>Donated To : <?php echo $_SESSION['orgname'];?></p>
 </div>
</div>

<div id="div4">
<p id="statement">Donation Amount  is <span id="money">₹ <?php echo $_SESSION['amount'];?></span> rupees</p>
<p id="quote">I do not know whether you can buy happiness from money or not, but I am sure you donated happiness with it.</p>
</div>
</div>
<button onclick="window.print()" id="print">Print</button>
</div>

</body>
</html>
