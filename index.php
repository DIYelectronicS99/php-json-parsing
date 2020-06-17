<?php 
	session_start();
	if(!isset($_SESSION['user']))
		header("location:login.php?msg=you have to login first!");

 ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comments</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@500&display=swap" rel="stylesheet"> 
</head>
<body>
<div class="top"><h2>Advanced Security</h2>
<div class="useractive">
	
		<div class="navbar">
				  
				  <div class="dropdown">
				    <button class="dropbtn">Welcome, <?php echo $_SESSION['user'];  ?>
				      <i class="fa fa-caret-down"></i>
				    </button>
				    <div class="dropdown-content">
				      <a href="profile.php">My Profile</a>
				      <a href="logout.php">Logout</a>
				      
				    </div>
				  </div> 
				</div>

</div></div>
<div class="container">
	
	
		<div class="nav">
			<ul>
				<li><i class="fa fa-home" aria-hidden="true"></i>
<a href="index.php">Home</a></li>
				<li><i class="fa fa-user" aria-hidden="true"></i>
<a href="profile.php">My Profile</a></li>
				<li><i class="fa fa-users" aria-hidden="true"></i>
<a href="#">Users</a></li>
				<li><i class="fa fa-unlock-alt" aria-hidden="true"></i>
<a href="#">User Roles</a></li>
			</ul>
		</div>
		<div class="main">
			<h2>Comments Wall</h2>
			<br>&nbsp;<br>

			<?php 

			$getcomments = file_get_contents("comment.json");
	$cjson = json_decode($getcomments);

	$clength = count($cjson);
	for ($i=$clength - 1; $i >=0 ; $i--) { ?>


		
			<p style="font-weight: bold;"><?php echo $cjson[$i]->comment; ?> </p><br><h4 style="font-weight: lighter;">- <?php echo $cjson[$i]->username." at ".$cjson[$i]->timestamp;  ?></h4><br>&nbsp;<br>

<?php
		# code...
	}

			 ?>
			
		

			<form action="addcomment.php" method="get">
				<label>Add Comment</label><br>
				<input required="" type="text" name="ncm"><br>
				<button>Add</button>

			</form>
		</div>
	

</div>
    
</body>
</html>