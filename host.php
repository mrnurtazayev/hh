<?php 
	session_start();
	$db = mysqli_connect('localhost', 'root', '', 'Aibek_homework1');

	$name = "";
	$surname = "";
	$address = "";
	$id = 0;
	$update = false;

	if (isset($_POST['save'])) {
		$name = $_POST['name'];
		$address = $_POST['address'];
		$surname = $_POST['surname'];

		mysqli_query($db, "INSERT INTO data (name, surname, address) VALUES ('$name', '$surname', '$address')"); 
		$_SESSION['message'] = "Address saved"; 
		header('location: index.php');
	}

if (isset($_POST['update'])) {
	$id = $_POST['id'];
	$name = $_POST['name'];
	$surname = $_POST['surname'];
	$address = $_POST['address'];

	mysqli_query($db, "UPDATE data SET name='$name', surname='$surname', address='$address' WHERE id=$id");
	$_SESSION['message'] = "Address updated!"; 
	header('location: index.php');
}
if (isset($_GET['del'])) {
	$id = $_GET['del'];
	mysqli_query($db, "DELETE FROM data WHERE id=$id");
	$_SESSION['message'] = "Address deleted!"; 
	header('location: index.php');
}