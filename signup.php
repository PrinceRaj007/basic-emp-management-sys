<?php      
    $error = false;
    $success = false;
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        include('connection.php');  
        $username = $_POST['username'];  
        $password = $_POST['password'];  
        $confirmPassword = $_POST['confirmPassword'];  
        
        //to prevent from mysqli injection  
        $username = stripcslashes($username);    
        if($password == $confirmPassword) {
            $sql = "INSERT INTO emp_login (id, username, password) VALUES (NULL, '$username', '$password')";  
            if (mysqli_query($con, $sql)) {
               $success=true;
             } else {
                echo "Failed to create account";
             }
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
    <title>Admin Signup </title>
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
                    echo '<div class="alert alert-danger" role="alert">Please re-enter your password !!</div>';
                }
                if($success){
                    echo '<div class="alert alert-success" role="alert">Admin account created successfully !! Please proceed with Login !!</div>';
                }
            ?>
            <form action="signup.php"  method="post">
                <h2 class="text-center">Admin Signup </h2>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Username" name="username" required="required">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Password" name="password" required="required">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Confirm Password" name="confirmPassword" required="required">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Signup</button>
                </div>
                <div class="clearfix">
                    <a href="login.php" class="float-right">Login</a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>