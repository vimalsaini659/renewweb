<?php
$conn = new mysqli('localhost', 'u348708165_developer', '^n9[^5XY/2!N', 'u348708165_gemdb17india');
$id = $_POST['id'];
$sql = "delete from admin where id = '".$id."'";
	$result = mysqli_query($conn, $sql);
	if($result){
		$array = array('response' => 'Admin User Deleted Successfully.');
		echo json_encode($array);
	}
?>