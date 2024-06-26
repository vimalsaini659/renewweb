<?php
include 'includes/session.php';

$id = $_SESSION['admin'];



if (isset($_POST['bookadd'])) {

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

	//insert new employee
	$sql = "INSERT INTO ai_book (book_name, book_author,book_image,book_pdf,book_price,book_shortDescription,long_descr) VALUES ('$book_name', '$book_author','$$filename1','$$filename2', '$book_price','$short_detail','$long_desc')";
	// $sql = "INSERT INTO ai_courses (center_id, course_title, course_details, course_fees,course_duration, isactive,program,course_image) VALUES ('$center_id', '$course_title','$course_details','$fees', '$duration','$status','$program','$filename')";
	//die();

	if ($conn->query($sql)) {

		$_SESSION['success'] = 'Book  added successfully';
	} else {

		$_SESSION['error'] = $conn->error;
	}
} else {

	$_SESSION['error'] = 'Fill up add form first';
}


e_book
header('location: .php');

?>


?>