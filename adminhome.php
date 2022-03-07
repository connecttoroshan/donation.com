<?php
session_start();

if(!isset($_SESSION['username']))
  {
    header('location:http://localhost/bca/admin.html');	
  }
  
  
 $connect=mysqli_connect('localhost','root','','edonation');
   
   $q="select * from orglist where verification='not verified'";
 
   $data=mysqli_query($connect,$q);
   
   $row=mysqli_num_rows($data);
 
 
   $q2="select * from orglist where verification='verified'";
   
   $data2=mysqli_query($connect,$q2);
   $row2=mysqli_num_rows($data2);
  
 
  mysqli_close($connect);
  
?>


<!DOCTYPE html>
<html>
 <head>
 <title>Administration Home</title>
 
 <link rel="stylesheet" type="text/css" href="home.css">
<style>
body
{
	background-image:url(nature.jpg);
}
.top-bar{
      background : rgb(0,0,0,0.7);
      padding: 15px 0px;
      text-align:center;
	  height:8vh;
      width: 100%;
	  box-shadow:0px 3px 5px gray;
	  display:flex;
   }
   
   .logoH
   {
	   float:left;
	   width:auto;
	  
   }   
   .adminH
   {
	    margin-top:10px;
		text-shadow:0 0 20px white;
		color:white;
		text-align:center;
	
		width:100%;	 

   }
   #logout
   {
	   float:right;
	   width:10%;

   }
   #logout a
   {
	   color:white;
	   text-decoration:none;
	   border:1px solid white;
	   padding:10px;
	   float:right;
	   transition-duration:0.7s;
   }
    #logout a:hover
   {
	   color:white;
	   border:1px solid purple;
	   background:purple;
	}
	.verify
	{
		background:maroon;
		border:none;
		outline:none;
		color:white;
		transition-duration:0.7s;
		padding:10px;
		font-size:17px;
	}
	.verify:hover
	{
	background:Green;
	cursor:pointer;
	color:white;
	text-decoration:underline;
	font-size:19px;
	}
	.donate:hover
   {
	background:Red;
   }
   .box
   {
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
   }
</style>    
 </head> 
 

 <body>

	<div class="top-bar" id="top-bar">
      
    <div class="logoH">
	    <a href="index.html"><img src="logoH.png" ></a>
   	</div>
	 <div class="adminH"> <h1 >ADMINISTRATIVE </h1> </div>
	  <div id="logout">
	<a href="adminlogout.php">Admin Logout</a>
   </div>
    </div> 


<?php if($row>0){ ?>
<div class="adminH"><h1>Unverified Organisations</h1></div>
<?php } ?>

<?php 

for($i=1;$i<=$row;$i++)
 {	 
   $result=mysqli_fetch_array($data);
?>

<form method="get" action="AdminOrgdetails.php">
<input type="hidden" value="<?php echo $result['ID']?>" name="id">

 <div class="box">


    <div><img src="<?php echo $result['logo']; ?>" alt="image" class="poster"></div>
 
   <div class="para">
   <input type="submit" value="<?php echo $result['name'];?>" class="h3" >
   <p><?php echo $result['description'];?></p>
   </div>
  
  <input type="submit" formaction="AdminAction.php" value="Verify" class="verify" name="action">
  <input type="submit" formaction="AdminAction.php" value="Delete" class="donate" name="action">
 </div>
</form>

<?php
 } 
?> 

<br>   
<div class="adminH"><h1 >These Are Verified Organisations</h1></div>


<?php 

for($i=1;$i<=$row2;$i++)
 {	 
   $result2=mysqli_fetch_array($data2);
?>

<form method="get" action="AdminOrgdetails.php">
<input type="hidden" value="<?php echo $result2['ID']?>" name="id">
 <div class="box">


    <div><img src="<?php echo $result2['logo']; ?>" alt="image" class="poster"></div>
 
   <div class="para">
   <input type="submit" value="<?php echo $result2['name'];?>" class="h3">
   <p><?php echo $result2['description'];?></p>
   </div>

  <input type="submit" formaction="AdminAction.php" value="Delete" class="donate" name="action">
 
 </div>
</form>

<?php
 } 
?> 

      
</body>
</html>
