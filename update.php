
<?php
	session_start();


	$getuserdata = file_get_contents("user.json");
	$json = json_decode($getuserdata);

	$length = count($json);

	$fname = $_GET['fname'];
	$lname = $_GET['lname'];
	$add = $_GET['add'];
	$phone = $_GET['phone'];

	for ($i=0; $i < $length; $i++) {

	if ($json[$i]->username == $_SESSION['user']) {

		$json[$i]->fname = $fname;

		$json[$i]->lname = $lname;
		$json[$i]->address = $add;
		$json[$i]->phone = $phone;


	 	# code...
	 } 
		# code...
	}

	$newjson = json_encode($json);
	file_put_contents("user.json", $newjson);

	header("location: profile.php?msg=updated!");

?>