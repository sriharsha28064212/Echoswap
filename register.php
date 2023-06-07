<?php

include 'config.php';

if(isset($_COOKIE['user_id'])){
   $user_id = $_COOKIE['user_id'];
}else{
   $user_id = '';
}

if(isset($_POST['rsubmit'])){

   $id = create_unique_id();
   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING); 
   $number = $_POST['number'];
   $number = filter_var($number, FILTER_SANITIZE_STRING);
   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $pass = sha1($_POST['pass']);
   $pass = filter_var($pass, FILTER_SANITIZE_STRING); 
   $c_pass = sha1($_POST['c_pass']);
   $c_pass = filter_var($c_pass, FILTER_SANITIZE_STRING);   

   $sql="SELECT * FROM users WHERE Email='$email' LIMIT 1";
   $result = mysqli_query($conn, $sql);
   

   if(mysqli_num_rows($result) > 0){
      $warning_msg[] = 'email already taken!';
   }else{
      if($pass != $c_pass){
         $warning_msg[] = 'Password not matched!';
      }else{
         $insert_user = "INSERT INTO `users`(id, name, number, email, password) VALUES('$id', '$name', '$number', '$email', '$c_pass')";
         $insert_user = mysqli_query($conn, $insert_user);
         
         if($insert_user){
            $verify_users ="SELECT * FROM `users` WHERE email = '$email' AND password = '$pass' LIMIT 1";
            $verify_users = mysqli_query($conn,$verify_users);
            $row = mysqli_fetch_assoc($verify_users);
         
            if(mysqli_num_rows($verify_users) > 0){
               setcookie('user_id', $row['id'], time() + 60*60*24*30, '/');
               header('location:shop_main.php');
            }else{
               $error_msg[] = 'something went wrong!';
            }
         }

      }
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width" />
    <title>Register</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="css/login_style.css">
</head>

<body background="images/bg-home.png">
    <div class="container">
        <form action="" method="POST">
            <div class="mb-3">
                <label for="exampleInputName" class="form-label">Full Name</label>
                <input type="text" class="form-control" id="exampleInputName" name="name" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    name="email" required>
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputNumber" class="form-label">Phone Number</label>
                <input type="text" class="form-control" id="exampleInputNumber" name="number">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="pass" required>
            </div>
            <div class="mb-3">
                <label for="ConfirmPassword" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="ConfirmPassword" name="c_pass">
            </div>
            <!-- <input type="submit" name="rsubmit" value="Submit"
                style="color:white;background-color:blue;border:none; width:90px;height: 40px;border-radius:12px;"> -->
            <button type="submit" class="btn btn-dark" name="rsubmit" >Submit</button>
            <p>Already a member? <a href="login.php">Login</a></p>
        </form>
    </div>
</body>
</html>