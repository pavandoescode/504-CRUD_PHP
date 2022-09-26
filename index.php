<?php

include_once("config.php");


$result = mysqli_query($mysqli, "SELECT * FROM users ORDER BY id DESC"); 
?>

<html>

<head>
	<link rel="stylesheet" href="style/style.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
	<title>CRUD in php</title>
</head>

<body>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

	
<div class="container">
	<h1 class="title ">CRUD in php</h1>
	<br/>

	<table class="table table-striped table-hover" >

		<tr>
			<td scope="col" >Name</td>
			<td scope="col" >Age</td>
			<td scope="col" >Email</td>
			<td scope="col" >Update</td>
		</tr>
		<?php
		
		while ($res = mysqli_fetch_array($result)) { ?>
			<tr scope='row'>
			<td> <?php echo $res['name'] ?> </td>
			<td> <?php echo $res['age'] ?>  </td>
			<td> <?php echo $res['email'] ?> </td>
			<td><a <?php echo "id='editBtn' class='bg-warning' href=\"edit.php?id=$res[id]\">Edit</a> | <a class='bg-danger' id='delBtn' href=\"delete.php?id=$res[id]\" >Delete</a></td>";
		}
		?>
	</table>

	<a id="newBtn" class="bg-success" href="add.php">Add New Data</a><br /></div>
</body>

</html>