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
<form action="" method="POST">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" name="password" id="exampleInputPassword1">
  </div>

  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
  <a href="signup.php" class="btn btn-primary">Signup</a>
</form>
</body>
</html>


<?php
if(isset($_POST['submit']))
{
    $email=$_POST['email'];
    $password=$_POST['password'];

    $sql="SELECT * from user where email='$email' and password='$password' ";
    $result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0){
        $_SESSION['email']=$email;
        header('Location: index.php');
    }
    else{
        echo "<script>  alert('Invalid Entries'); </script>";
    }


}

?>