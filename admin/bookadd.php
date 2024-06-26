<?php
include 'includes/session.php';

$id = $_SESSION['admin'];



if (isset($_POST['add'])) {

	$book_name = $_POST['book_name'];

	$book_author = $_POST['author'];


	$book_price = $_POST['Price'];

	$short_detail = $_POST['shortDetail'];

	$long_desc = $_POST['LongDescription'];

	// photo
	$filename1 = $_FILES['bookphoto']['name'];
	move_uploaded_file($_FILES['bookphoto']['tmp_name'], '../uploads/' . $filename1);
	$filename2 = $_FILES['pdfphoto']['name'];
	move_uploaded_file($_FILES['pdfphoto']['tmp_name'], '../uploads/' . $filename2);

	//$hash_pass = password_hash($password, PASSWORD_DEFAULT);



	//creating employeeid

	/*$letters = '';

		$numbers = '';

		foreach (range('A', 'Z') as $char) {

		    $letters .= $char;

		}

		for($i = 0; $i < 10; $i++){

			$numbers .= $i;

		}

		$employee_id = substr(str_shuffle($letters), 0, 3).substr(str_shuffle($numbers), 0, 9);*/

	//insert new employee

	$sql = "INSERT INTO ai_courses (center_id, course_title, course_details, course_fees,course_duration, isactive,program,course_image) VALUES ('$center_id', '$course_title','$course_details','$fees', '$duration','$status','$program','$filename')";
	//die();

	if ($conn->query($sql)) {

		$_SESSION['success'] = 'Course added successfully';
	} else {

		$_SESSION['error'] = $conn->error;
	}
} else {

	$_SESSION['error'] = 'Fill up add form first';
}



header('location: courses.php');

?>


?>