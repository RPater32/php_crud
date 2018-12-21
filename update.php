
<?php 

include('conn.php');

	$id = $_GET['q'];

	$query = "Select Id, Name, Email, Phone from contacts where Id= $id";

	$run_query = mysqli_query($conn, $query);

	$contact = mysqli_fetch_object($run_query);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Update</title>
</head>
<body>

	<h1>Update</h1>
	<hr>
<!-- Create Contats Form -->
	<fieldset>
			<legend>Contacts</legend>

<form method="POST" action="edit.php?q=<?= $contact->Id; ?>">

			<table>
				<tr>
					<td>Name:</td>
					<td><input type="text" name="name" value="<?= $contact->Name;?>" required></td>
				</tr>
				<tr>
					<td>Email:</td>
					<td><input type="text" name="email" value="<?= $contact->Email;?>" required></td>
				</tr>
				<tr>
					<td>Phone:</td>
					<td><input type="text" name="phone" value="<?= $contact->Phone;?>" required></td>
				</tr>
				<tr>
				<td colspan="2">
					<hr>
					<button type="submit" name="submit">
					 Update Contact</button>
				</td>
			</tr>
			</table>

			</form>
		</fieldset>

</body>
</html>