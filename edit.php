<?php

	include('conn.php');

	$id = $_GET['q'];
	$name = $_POST['name'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];

$query = "UPDATE contacts 
			set Name = '$name', Email = '$email', Phone = '$phone' 
			where Id = $id";

		if (mysqli_query($conn, $query)) {
			header("location: index.php");
		} else {
			echo 'Failed to Update';
		}
