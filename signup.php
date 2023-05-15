<?php  
ob_start();
session_start();
$conn=mysqli_connect('localhost','root','','dropbox');   ?>  

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Document</title>
    <style>
        form{
            width: 400px;
            margin: 0 auto;
            margin-top: 3%;
        }
    </style>
</head>
<body>
    
<form   action="" method="POST">
<div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Username</label>
    <input type="text" class="form-control" name="username" id="exampleInputEmail1" aria-describedby="emailHelp">
 </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp">
 </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" name="password" id="exampleInputPassword1">
  </div>
  <a href="login.php" class="btn btn-primary">Login</a>
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>

</form>
</body>
</html>



<?php

if(isset($_POST['submit']))
{
    $email=$_POST['email'];
    $password=$_POST['password'];
    $username=$_POST['username'];

    $sql="INSERT into user(username,email,password) values('$username','$email','$password')";
    $result=mysqli_query($conn,$sql);
    if($result){
        $_SESSION['email']=$email;
        header('Location: index.php');
    }
    else{
        echo "<script>  alert('Not Inserted'); </script>";
    }


}





?>