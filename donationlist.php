<?php
session_start();
if(!isset($_SESSION['username']))
  {
    header('location:http://localhost/bca/userlogin.html');	
  }
  
  $connect=mysqli_connect('localhost','root','','edonation');
   
   $q="select * from receipt where username='$_SESSION[username]'";
 
   $data=mysqli_query($connect,$q);
   
   $row=mysqli_num_rows($data);
 
   mysqli_close($connect);

?>
<!DOCTYPE html>
<html>
<head>
<title>Your Donations</title>
<link href="PaymentReceipt.css" rel="stylesheet" type="text/css">
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

<table id="don_table" >
  <tr>
    <th>ID</th>
    <th>Donation To</th>
    <th>Date</th>
	<th>Donor Name</th>
	<th>Donor Phone</th>
	<th>Donor Email</th>
	<th>Donation Amount</th>
  </tr>
 <?php
    for($i=1;$i<=$row;$i++)
	{
		$result=mysqli_fetch_array($data);
 ?> 
  <tr>
    <td><?php echo $result['id'];?></td>
    <td><?php echo $result['orgname'];?></td>
    <td><?php echo $result['date'];?></td>
	<td><?php echo $result['name'];?></td>
	<td><?php echo $result['phone'];?></td>
	<td><?php echo $result['email'];?></td>
	<td><?php echo "₹ ". $result['amount'];?></td>
  </tr>

 <?php 
    } 
 ?>

</table>

</body>
</html>