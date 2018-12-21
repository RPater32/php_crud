<?php

	include('conn.php');

	$id = $_GET['q'];

	$query = "Select Id, Name, Phone, Email from Contacts where Id= $id";

	$run_query = mysqli_query($conn, $query);

	$contact = mysqli_fetch_object($run_query);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Details</title>
</head>
<body>

	<h2>Contact Detail</h2>
	<hr>

	<a href="index.php"><button>Back</button></a>

	<fieldset>
		<legend>Contact</legend>

	<table border="1" cellspacing="5" cellpadding="3" width="50%" height="200px">
		<tr>
			<th>#ID</th>
			<td> <?= $contact->Id; ?></td>
		</tr>
		<tr>
			<th>Name</th>
			<td> <?= $contact->Name; ?></td>
		</tr>
		<tr>
			<th>Email</th>
			<td> <?= $contact->Email; ?></td>
		</tr>
		<tr>
			<th>#Phone</th>
			<td> <?= $contact->Phone; ?></td>
		</tr>
		<tr>
			<td colspan="2" align="center">
			<a href="delete.php?q=<?= $contact->Id; ?>" onclick="return confirm('Are you sure')"><button>Delete</button></a>

			</td>
		</tr>

	</table>
</fieldset>

</body>
</html>