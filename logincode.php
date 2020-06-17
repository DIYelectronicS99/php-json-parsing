<?php  
session_start();

	$username = $_GET['username'];
	$password = $_GET['password'];

	$getuserdata = file_get_contents("user.json");
	$json = json_decode($getuserdata);

	$length = count($json);

	for ($i=0; $i < $length; $i++) { 
		# code...
		if ($username == $json[$i]->username && $password == $json[$i]->password) {

			echo "yaya logged in!";
			$_SESSION['user'] = $json[$i]->username;
			header("location: index.php?msg=logged in!");
			break;
			# code...
		}
		else{
			header("location: index.php?msg=error!");
		}
	}


?>