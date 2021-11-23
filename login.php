<?php      
    $error = false;
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        include('connection.php');  
        $username = $_POST['username'];  
        $password = $_POST['password'];  
        
        //to prevent from mysqli injection  
        $username = stripcslashes($username);  
        $password = stripcslashes($password);  
        $username = mysqli_real_escape_string($con, $username);  
        $password = mysqli_real_escape_string($con, $password);  
        
        $sql = "select * from emp_login where username = '$username' and password = '$password'";  
        $result = mysqli_query($con, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
        $error = "false";
        if($count == 1){  
            session_start();
            $_SESSION['loggedin'] = "true";
            $_SESSION['username'] = $username;
            header("Location: https://localhost/EmpMangSys/dashboard.php");  
        }  
        else{  
            $error = true;                
        } 
    }
       
?> 

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin Login </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <div class="login-form">
            <?php
                if($error){
                    echo '<div class="alert alert-danger" role="alert">Invalid credentials !!</div>';
                }
            ?>
            <form action="login.php"  method="post">
                <h2 class="text-center">Admin Log in </h2>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Username" name="username" required="required">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Password" name="password" required="required">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Log in</button>
                </div>
                <div class="clearfix">
                    <a href="signup.php" class="float-right">Create a new Admin Account</a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>