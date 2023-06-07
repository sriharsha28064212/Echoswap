<?php

include 'config.php';

if(isset($_COOKIE['user_id'])){
   $user_id = $_COOKIE['user_id'];
}else{
   $user_id = '';
}

if(isset($_POST['lsubmit'])){

   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING); 
   $pass = sha1($_POST['pass']);
   $pass = filter_var($pass, FILTER_SANITIZE_STRING); 
   $select_users = "SELECT * FROM `users` WHERE email = '$email' AND password = '$pass' LIMIT 1";
   $select_users= mysqli_query($conn, $select_users);
   $row = mysqli_fetch_assoc($select_users);

   if(mysqli_num_rows($select_users) > 0){
      setcookie('user_id', $row['id'], time() + 60*60*24*30, '/');
      header('location:shop_main.php');
   }else{
      $warning_msg = 'Incorrect username or password!';
      echo '<script>
               window.onload = function() {
                  alert("'.$warning_msg.'");
               };
            </script>';
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

<body>
    <div class="container">
        <form action="" method="POST">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    name="email" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="pass" required>
            </div>
            <button type="submit" class="btn btn-dark" name="lsubmit" >Submit</button>
            <p>Don't have an account? <a href="register.php">Register</a></p>
        </form>
    </div>
</body>
</html>