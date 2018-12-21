<?php

include('conn.php');
 	
 	$id = $_GET['q'];

 	$query = "DELETE FROM contacts where Id= $id";

 	mysqli_query($conn, $query);

 	if(mysqli_query($conn, $query)) {
 		header("location: index.php");
 	} else {

 		echo 'Cannot Delete';
 	}