<?php 
 session_start();

 if(!isset($_SESSION['username']))
  {
    header('location:http://localhost/bca/userlogin.html');	
  }
  

$id=$_GET['id'];
$con=mysqli_connect('localhost','root','','edonation');
$q="Select * from orglist where id='$id'";
$result=mysqli_query($con,$q);
$data=mysqli_fetch_array($result);

$_SESSION['accno'] =$data['account_no'];
$_SESSION['orgname'] =$data['name'];
$_SESSION['logo']=$data['logo'];

?>

<!DOCTYPE html>
<html>
<head>
<title>Payment||</title>
<link href="payment.css" rel="stylesheet" type="text/css">
</head>
<body>
<nav class="menu" id="menu">
      
	  <div class="logo">
	  <img src="logoH.png" alt="icon">
		
	  </div>
	  <a href="userlogout.php" id="logout">Logout <?php echo $_SESSION['username']; ?> </a> 
	  <ul>
		 <li ><a href="home.php" >Organisations List</a></li>
         <li><a href="contact.html">Contact</a></li>
         <li id="active">Donation</li>
      </ul>
	  
    </nav>
<div id="outerbox">
<h1> Donation To <?php echo $data['name'];?> </h1><br><br>
<div id="box">
<form method="post" action="PaymentProcess.php">

<label for="amount">Amount:</label><input type="number" id="amount" name="amount">INR<br>

<label for="select">Card Type:</label><select id="select" name="CardType">
								<option value="DEBIT">DEBIT</option>
								<option value="CREDIT">CREDIT</option>
							 </select><br>	
<label for="CardHolder">Card Holder Name:</label><input type="text" id="CardHolder" name="CardHolder"><br>
<label for="CardNumber">Card Number:</label><input type="number" id="CardNumber" name="CardNumber"><br>	

<label for="month">Expiry Date:</label>
                                    <select name="month" id="month">
                                        <option value="January">January</option>	
										<option value="February">Februrary</option>
										<option value="March">March</option>
										<option value="April">April</option>
										<option value="May">May</option>
										<option value="June">June</option>
										<option value="July">July</option>	
										<option value="August">August</option>
										<option value="September">September</option>
										<option value="October">October</option>
										<option value="November">November</option>
										<option value="December">December</option>
									</select>
									
									<select name="year" id="year">
                                        <option value="2020">2020</option>	
										<option value="2021">2021</option>
										<option value="2022">2022</option>
										<option value="2023">2023</option>
										<option value="2024">2024</option>
										<option value="2025">2025</option>
									</select>
<label for="cvv">CVV Number:</label><input type="number" id="cvv" name="cvv"><br>	
<label for="pin">PIN Number:</label><input type="password" id="pin" name="pin"><br>		
<div id="buttondiv"><input  type="submit" value="Donate" id="button"></div>		 
</form>
</div>
</div>

</body>
</html>