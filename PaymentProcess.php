<?php
 session_start();


 if(!isset($_SESSION['username']))
  {
    header('location:http://localhost/bca/userlogin.html');	
  }
  
$amount=$_POST['amount'];
$CardType=$_POST['CardType'];
$CardHolder=$_POST['CardHolder'];
$CardNumber=$_POST['CardNumber'];
$year=$_POST['year'];
$month=$_POST['month'];
$cvv=$_POST['cvv'];
$pin=$_POST['pin'];

$topay=$_SESSION['accno'];

$con=mysqli_connect('localhost','root','','bank');
$q="select * from accounts where name='$CardHolder'&& CardType='$CardType' && CardNumber='$CardNumber' && ExpiryMonth='$month' && ExpiryYear='$year' && cvv='$cvv' && pin='$pin'";

$data=mysqli_query($con,$q);
$row=mysqli_num_rows($data);

$_SESSION['amount']=$amount;
$_SESSION['orgname'];
$_SESSION['logo'];

if($row==1)
    {
	 
	 $result=mysqli_fetch_array($data);
	 
	 if($amount>$result['balance'])
	 {
		 echo"Sorry You Don't have The Minimum Balance in your account for this Transaction.";
	 }
	 else
	 {
		$accno=$result['account_no'];
		
		$q="update accounts set balance=balance-'$amount' where account_no='$accno'";	
		mysqli_query($con,$q);
		
		
		$_SESSION['entry']="Data Entry";	
		
		$q2="update accounts set balance=balance+'$amount' where account_no='$topay'";
		mysqli_query($con,$q2);
		header('location:http://localhost/bca/PaymentReceipt.php');
	 }
	} 
  else
    {
	  
	  echo "User Not Found! Check your Details ";
      
	} 
?>