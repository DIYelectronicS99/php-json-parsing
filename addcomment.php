<?php 
session_start();
	$getcomments = file_get_contents("comment.json");
	$cjson = json_decode($getcomments);
	$len = count($cjson);

	$commentadd = $_GET['ncm'];
	$user = $_SESSION['user'];
	$timestamp = date('m/d/Y h:i:s a', time());

	 $newset = array(  
                     'username'               =>     $user,  
                     'comment'          =>     $commentadd,
                     'timestamp'	=>	$timestamp
                ); 
	 array_push($cjson, $newset);
	 $jsondata = json_encode($cjson);
	 file_put_contents("comment.json", $jsondata);

	 header("location:index.php?msg=comment added!");


?>