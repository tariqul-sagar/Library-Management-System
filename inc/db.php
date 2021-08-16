<?php

	$db = mysqli_connect("localhost", "root", "", "library");

	if ( $db ){
		// echo "Database Connected Successfully!!!";
	}
	else{
		die("MySQLi connection Failed." . mysqli_error($db));
	}

?>