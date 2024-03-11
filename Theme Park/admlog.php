


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>

    <div class="container">
        <div class="form-container">
            <h2 align="center">Admin</h2>
            <form action="admlog.php" method="POST" align="center">
                <input type="text" name="username" placeholder="Username" required><br>
                <input type="password" name="password" placeholder="Password" required><br>
                <button type="submit" name="login">Login</button>
            </form>
            
        </div>
    </div>

</body>
</html>

<?php
// @include 'conect.php';
// if(isset($_POST["login"]))
// {
    

//     $username = $_POST['username'];
//     $password = $_POST['password'];

//     $sql = "SELECT * FROM `users` WHERE `username` = '$username' AND `password` = '$password'";
//     $result = mysqli_query($conn, $sql);

//     if(mysqli_num_rows($result) > 0)
//     {
//         header("location: adm.php");
//         exit();
//     }
//     else
//     {
//         echo "<script>alert('Invalid username or password')</script>";
//     }
// }
?>
 <?php  
 @include 'conect.php'; 
 if(isset($_POST["login"]))
  { $username = $_POST['username']; 
 $password = $_POST['password']; 
 $sql = "SELECT * FROM `users` WHERE `username` = 'admin@123' AND `password` = 'admin123'";
  $result = mysqli_query($conn, $sql); 
  if(mysqli_num_rows($result) > 0) 
  { 
    header("location: adm.php");
     exit(); 
     } 
     else 
     { 
        echo "<script>alert('Invalid username or password')</script>";
      } 
      } 
      ?>