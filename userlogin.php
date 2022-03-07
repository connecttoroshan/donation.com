<?php
   session_start();
   
   $username=$_POST['username'];
   $password=$_POST['password'];

  $connect=mysqli_connect('localhost','root','','edonation');
  
  $query="select * from user where username='$username' && password='$password'";
  
  $data=mysqli_query($connect,$query);
  
 $row= mysqli_num_rows($data);
  
  if($row==1)
    {
	 $_SESSION['username']=$username;
     header('location:http://localhost/bca/home.php');
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
<title>This is checking page</title>
</head>
<body>
</br></br>
<h1>If you are not redirected to the page then it may be your username or password is incorrect.</h1>

<h2>for sign in again <a href="userlogin.html">Click Here</a></h2>
<h2>if you are not register please <a href="usersignup.html">Sign up here</a></h2>


</body>
</html>