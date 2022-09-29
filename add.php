<?php

include_once("config.php");

if(isset($_POST['Submit'])) {	
	$name = mysqli_real_escape_string($mysqli, $_POST['name']);
	$age = mysqli_real_escape_string($mysqli, $_POST['age']);
	$email = mysqli_real_escape_string($mysqli, $_POST['email']);
		
	
	if(empty($name) || empty($age) || empty($email)) {
				
		if(empty($name)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		
		if(empty($age)) {
			echo "<font color='red'>Age field is empty.</font><br/>";
		}
		
		if(empty($email)) {
			echo "<font color='red'>Email field is empty.</font><br/>";
		}
		
		
	} else { 
		
		$result = mysqli_query($mysqli, "INSERT INTO users(name,age,email) VALUES('$name','$age','$email')");
		
		header("Location: index.php");
	}
}
?>
<html>
<head>
    <link rel="stylesheet" href="style/style.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

	
	<link rel="icon" type="image/x-icon" href="style/favicon.ico">
	
	<title>Add Data</title>
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    
	<div class="container itemcard">
		<h1 class="title">Add New Record </h1> <br><br>
		<form action="add.php" method="post">
		

			<div class="mb-3">
					<label for="name" class="form-label">Name</label>
							<input  class="form-control rounded-pill" type="text" aria-describedby="emailHelp" name="name" >
</div>

			<div class="mb-3">
					<label for="age" class="form-label">Age</label>
							<input class="form-control rounded-pill" type="text" aria-describedby="emailHelp" name="age" > 
							
			</div>


			<div class="mb-3">
				<label for="email" class="form-label ">Email</label>
						<input  class="form-control rounded-pill" type="text" aria-describedby="emailHelp" name="email" > 
						
				
			</div>



				
                <button type="submit"  class="btn btn-outline-success" name="Submit" value="Add">Add New Record</button> <br>
			
		
        <a id="homeBtn" class="btn my-4 btn-sm btn-secondary" href="index.php">Home</a>
	</form>

</div>
</body>
</html>
