<?php
include 'includes/session.php';

$id = $_SESSION['admin'];

if (isset($_POST['add'])) {
	$book_name = $_POST['book_name'];

	$book_author = $_POST['author'];


	$book_price = $_POST['Price'];

	$short_detail = $_POST['shortDetail'];

	$long_desc = $_POST['LongDescription'];

	$sql = "UPDATE ai_book set book_name = '$book_name',  book_author='$book_author', book_price = '$book_price', book_shortDescription = '$short_detail', long_descr = '$long_desc' WHERE book_id='$id'";
	// $sql = "UPDATE ai_courses set center_id = '$center_id',  program='$center_program', course_title = '$course_title', course_details = '$course_details', course_fees = '$fees', course_duration = '$duration', isactive = '$status' WHERE cid='$id'";
	//die();

	if ($conn->query($sql)) {

		$_SESSION['success'] = 'Book updated successfully';
	} else {

		$_SESSION['error'] = $conn->error;
	}
} else {

	$_SESSION['error'] = 'Fill up add form first';
}

header('location: e_book.php');
