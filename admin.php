<?php
   session_start();
   
   
   
   $username=$_POST['username'];
   $password=$_POST['password'];
   
   
  $connect=mysqli_connect('localhost','root','','edonation');
  
  $query="select * from admin where username='$username' && password='$password'";
  
  $data=mysqli_query($connect,$query);
  
 $row= mysqli_num_rows($data);
   
  if($row==1)
    {
	 $_SESSION['username']= $username;
	  
	 header('location:http://localhost/bca/adminhome.php');
	} 
  else
    {
	  
	  echo "User Not Found! Check your username & password ";
      
	}  
 mysqli_close($connect);
?>

<!DOCTYPE html>
<html>
<head>
<title>Admin Login</title>
</head>
<body>
</br></br>
<h1>If you are not redirected to the page then it may be your username or password is incorrect.</h1>

<h2>for sign in again <a href="admin.html">Click Here</a></h2>


</body>
</html>