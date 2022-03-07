<?php
   session_start();
   
 if(!isset($_SESSION['username']))
  {
    header('location:http://localhost/bca/orglogin.html');	
  }
   
   $id=$_SESSION['id'];
    
	
    
  $connect=mysqli_connect('localhost','root','','edonation');
  
  $query="select * from orglist where id='$id'";
  
  $data=mysqli_query($connect,$query);
  
  $result=mysqli_fetch_array($data);
   
  mysqli_close($connect);
  $_SESSION['name']=$result['name'];
 
 
?>

<!DOCTYPE html>
<html>
<head>
<title>Organisation Home</title>

<link rel="stylesheet" type="text/css" href="orghome.css">


</head>
<body>


<!-- Menu!-->
<div id="topbar"> 
    <div id="edonation">  
	
	<img src="logoV.png" alt="icon" >
    </div>
 
  <div id="name">
  
   <h1><?php echo $result['name'];?></h1>
  </div>
  
 
   <div id="list">
	<a href="orglogout.php">Logout</a>
	
   </div>
</div>

<!--!-->

<div id="orgposter"><img src="<?php echo $result['poster'];?>" alt="poster"></div>

<h2 id="header">You can add new topics from this section that will be show on your section of the website.</h2>
<h3 style="text-align:center;color:red"><?php echo $_SESSION['message']?></h3>

<!-- ****************************Data Entry Section********************** !-->

<div id="add-data"><form action="orghomedata.php" method="post" enctype="multipart/form-data">
   <label>Heading:</label><input type="text" id="head" class="fields" name="heading"><br><br>
   
   <label>Information: </label><textarea type="text" id="text" class="fields" name="information"></textarea><br><br><br><br><br>
   
   <label>Select Pictures Related to Topic:</label><input type="file" id="pics" name="pictures[]" multiple>
   <input type="submit" value="Send Data" class="send-button">
</form></div>



<div class="edit" style="text-align:center">
<form action="edit.php" method="get">
<input type="hidden" value="<?php echo $id?>">
<input type="submit" value="Edit Your Details That shows on Your Main-Page" class="edit-button" >
</form>
</div>

<div id="orgname"> 
	<img src="<?php echo $result['logo'];?>" alt="logo" id="logo">
    <h1><?php echo $result['name'];?></h1>
</div>


</body>
</html>