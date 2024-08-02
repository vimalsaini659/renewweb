<?php

	include 'includes/session.php';



	if(isset($_POST['edit'])){

		$userid = $_POST['userid'];

		$firstname = $_POST['firstname'];

		$lastname = $_POST['lastname'];

		$username = $_POST['username'];

		$password = $_POST['password'];
		$hashed_password = password_hash($password, PASSWORD_DEFAULT);

		$sql = "UPDATE admin SET firstname = '$firstname', lastname = '$lastname', username = '$username', password= '$hashed_password' WHERE id = '$userid'";

		if($conn->query($sql)){

			$_SESSION['success'] = 'User updated successfully';

		}

		else{

			$_SESSION['error'] = $conn->error;

		}



	}

	else{

		$_SESSION['error'] = 'Select student to edit first';

	}



	header('location: admin_users.php');

?>