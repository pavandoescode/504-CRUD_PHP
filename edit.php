<?php

include_once("config.php");

if (isset($_POST['update'])) {

	$id = mysqli_real_escape_string($mysqli, $_POST['id']);

	$name = mysqli_real_escape_string($mysqli, $_POST['name']);
	$age = mysqli_real_escape_string($mysqli, $_POST['age']);
	$email = mysqli_real_escape_string($mysqli, $_POST['email']);

	if (empty($name) || empty($age) || empty($email)) {

		if (empty($name)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}

		if (empty($age)) {
			echo "<font color='red'>Age field is empty.</font><br/>";
		}

		if (empty($email)) {
			echo "<font color='red'>Email field is empty.</font><br/>";
		}
	} else {

		$result = mysqli_query($mysqli, "UPDATE users SET name='$name',age='$age',email='$email' WHERE id=$id");


		header("Location: index.php");
	}
}
?>
<?php

$id = $_GET['id'];

$result = mysqli_query($mysqli, "SELECT * FROM users WHERE id=$id");

while ($res = mysqli_fetch_array($result)) {
	$name = $res['name'];
	$age = $res['age'];
	$email = $res['email'];
}
?>
<html>

<head>
	<link rel="stylesheet" href="style/style.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
	<link rel="icon" type="image/x-icon" href="style/favicon.ico">
	
	<link rel="icon" type="image/x-icon" href="style/favicon.ico">
	<title>Edit User -<?php echo $name; ?></title>
</head>

<body>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>


	
	
	<div class="container">
		
		<h1>Edit <?php echo $name; ?> </h1> <br><br>


		<form action="edit.php"  method="post" >


		<div class="mb-3">
		<label for="name" class="form-label">Name</label>
					<input  class="form-control" type="text" aria-describedby="emailHelp" name="name" value="<?php echo $name; ?>">
</div>

			<div class="mb-3">
			<label for="age" class="form-label">Age</label>
					<input class="form-control" type="text" aria-describedby="emailHelp" name="age" value="<?php echo $age; ?>"> 
			</div>

			<div class="mb-3">
			<label for="email" class="form-label">Email</label>
					<input type="hidden" name="id" value=<?php echo $_GET['id']; ?>>
					<input  class="form-control rounded-pill " type="text" aria-describedby="emailHelp" name="email" value="<?php echo $email; ?>"> 
			</div>

			<button type="submit" class="btn btn-outline-success" name="update" value="Update">Update Data</button><br>


			


			<a id="homeBtn" class=" my-4 btn btn-sm btn-secondary" href="index.php">Home</a>
		</form>
	</div>

</body>

</html>