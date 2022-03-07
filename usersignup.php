<?php 
 
 $name       =$_POST['fname'];
 $username   =$_POST['username'];
 $password   =$_POST['password'];
 $email      =$_POST['email'];
 $phone      =$_POST['phone'];
 $gender     =$_POST['gender'];
 $dob        =$_POST['dob'];
 
 $dbname="edonation";
$con=mysqli_connect('localhost','root','',$dbname);

 $pass = password_hash($password, PASSWORD_DEFAULT);
 $sql= "insert into user (username,password,name,email,phone,gender,dob) values ('$username',$pass,'$name','$email',$phone,'$gender','$dob')";

    mysqli_query($con,$sql); 

	mysqli_close($con);

?>

<!DOCTYPE html>
<html>
<head>
<title>Sign UP Success Page</title>
</head>
<body>
</br></br>
<h1>you are success fully Register please sign in through Given Page</h1>

<h2>for sign in <a href="userlogin.html">Click Here</a></h2>


</body>
</html>