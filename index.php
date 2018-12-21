<?php
 

 	include('conn.php');

 	if ( isset($_POST['submit']) ) {

 		$name =	$_POST['name'];
 		$email = $_POST['email'];
 		$phone = $_POST['phone'];

 	$query = "Insert into contacts (name, email, phone)
			values('$name','$email','$phone');";

		if (mysqli_query($conn, $query)){
			echo '<strong style="color: green">Contact Has Been Added</strong>';
		}
 	}

 	//Showing Data

 	$query = "Select * From contacts";

 	$run_query = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html>
<head>
		<title>Contact</title>
</head>
<body>
	
	<h1>Contacts</h1>
	<hr>
<!-- Create Contats Form -->
	<fieldset>
			<legend>Contacts</legend>

<form method="POST" action="index.php">

			<table>
				<tr>
					<td>Name:</td>
					<td><input type="text" name="name" required></td>
				</tr>
				<tr>
					<td>Email:</td>
					<td><input type="text" name="email" required></td>
				</tr>
				<tr>
					<td>Phone:</td>
					<td><input type="text" name="phone" required></td>
				</tr>
				<tr>
				<td colspan="2">
					<hr>
					<button type="submit" name="submit">
					 Create Contact</button>
				</td>
			</tr>
			</table>

			</form>
		</fieldset>

<!--Contacts List -->

<h1>Contacts List</h1>
<hr>

<?php

if($run_query->num_rows== 0){
 echo "<strong style='color: orange'>No Data Available</strong>";
} else {

?>

<fieldset>
	 <legend>Contacts List</legend>
<table border="1" width="50%" cellpadding="5" cellspacing="5">
	<tr>
		<th>#ID</th>
		<th>Name</th>
		<th>Email</th>
		<th>Phone</th>
		<th>Action</th>
	</tr>
		<?php while ($contact = mysqli_fetch_object($run_query) ): ?>

	<tr>
		<td> <?= $contact->Id ?> </td>
		<td> <?= $contact->Name ?> </td>
		<td> <?= $contact->Email ?> </td>
		<td> <?= $contact->Phone ?> </td>
		<td> 
			<a href="delete.php?q=<?= $contact->Id; ?>"" onclick ="return confirm('Are you sure you want to delete this')"><button>Delete</button></a>
			<a href="details.php?q=<?= $contact->Id; ?>"><button>Details</button></a>
			<a href="Update.php?q=<?= $contact->Id; ?>"><button>Update</button></a>
		</td>
	</tr>
		<?php endwhile; ?>

</table>
	</fieldset>

<?php } ?>
</body>
</html>