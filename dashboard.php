<?php
	session_start();
	if( $_SESSION['loggedin']!="true"){
	    header("Location: https://localhost/EmpMangSys/login.php");
	    exit;
	}
	include 'connection.php';
	$sql = "select * from emp_detail";  	
	$result = mysqli_query($con, $sql);  


?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Dashboard</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="dashboardStyle.css">

</head>
<body>
	<div class="logout">
	<a href="logout.php"><button class="btn btn-primary">LogOut</button></a>
	</div>
<div class="container-xl">
	<div class="table-responsive">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-6">
						<h2>Manage <b>Employees</b></h2>
					</div>
					<div class="col-sm-6">
						<a href="addEmployee.php" class="btn btn-success" ><i class="material-icons">&#xE147;</i> <span>Add New Employee</span></a>
					</div>
				</div>
			</div>
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th></th>
						<th>Name</th>
						<th>Email</th>
						<th>Address</th>
						<th>Phone</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
				<?php
					while($row=mysqli_fetch_array($result)){
				?>
					<tr>
						<td></td>
						<td><?php echo $row["emp_name"] ?></td>
						<td><?php echo $row["email"] ?></td>
						<td><?php echo $row["address"] ?></td>
						<td><?php echo $row["phone"] ?></td>
						<td>
							<a href="edit.php?id=<?php  echo $row["emp_id"]?>" class="edit" ><i class="material-icons" >&#xE254;</i></a>
							<a href="delete.php?id=<?php  echo $row["emp_id"]?>" class="delete" ><i class="material-icons" >&#xE872;</i></a>
						</td>
						<?php
							}
						?>
					</tr>
					
				</tbody>
			</table>
		</div>
	</div>        
</div>
</body>
</html>