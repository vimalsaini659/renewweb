<?php
  $db_host = "217.21.74.201";
  $db_user = "u348708165_qeBAK";
  $db_pass = "Z4j3B0uDfo";
  $db_name = "u348708165_YzXw4";
  // $db_host = "localhost";
  // $db_user = "root";
  // $db_pass = "";
  // $db_name = "rnewweb";

  $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
  if (!$conn) {
	  die("Database connection failed: " . mysqli_connect_error());
  }

