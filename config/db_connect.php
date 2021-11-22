<?php 

	// connect to the database
	$conn = mysqli_connect('localhost:3307', 'blood_donor1', 'admin', 'blood_donor_finder');

	// check connection
	if(!$conn){
		echo 'Connection error: '. mysqli_connect_error();
	}

?>