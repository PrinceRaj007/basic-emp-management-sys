<?php

    include 'connection.php';
    session_start();
    if( $_SESSION['loggedin']!="true"){
        header("Location: https://localhost/EmpMangSys/login.php");
        exit;
    }

    $error = false;
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $username = $_POST['username'];  
        $email = $_POST['email'];  
        $address = $_POST['address'];  
        $phone = $_POST['phone'];  
          
        $sql = "INSERT INTO emp_detail ( emp_name, email, address, phone) VALUES ( '$username', '$email', '$address', '$phone')";
        // $sql = "UPDATE  emp_detail SET emp_id = NULL, emp_name = '$username', email = '$email', address = '$address', phone = '$phone' WHERE emp_id = '$id'";
        if (mysqli_query($con, $sql)) {
            header("Location: https://localhost/EmpMangSys/dashboard.php");
         } else {
            echo "Failed to update";
         }
    }
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
    <title> Add Employee  </title>
    <body>
        
       <div class="cotainer" style=" width: 700px;  margin: 50px auto; padding: 40px; font-size: 15px;background: #e7e6e6;">
        <h2 style="text-align: center;">Add Employee </h2>
      
         <form action="addEmployee.php"  method="post">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" name="username"  required>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email"    required>
                </div>
                <div class="form-group">
                    <label>Address</label>
                    <textarea class="form-control"  name="address" required></textarea>
                </div>
                <div class="form-group">
                    <label>Phone</label>
                    <input type="text" class="form-control"  name="phone"  required>
                </div>					
                <input type="submit" class="btn btn-info" value="Add">
         </form>
       </div>
    </body>
</html>