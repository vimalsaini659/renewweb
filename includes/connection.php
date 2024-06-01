<?php
  $db_host = "localhost";
  $db_user = "root";
  $db_pass = "";
  $db_name = "rnewweb";

  $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
  if (!$conn) {
	  die("Database connection failed: " . mysqli_connect_error());
  }

	// $conn = new mysqli('localhost', 'root', '', 'u348708165_YzXw4');
  	// if ($conn->connect_error) {

	//     die("Connection failed: " . $conn->connect_error);

	// } 