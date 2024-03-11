<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login & Registration</title>
    <!-- <link rel="stylesheet" href="st.css"> -->
    <style>* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: Verdana, Geneva, Tahoma, sans-serif;
}

.container {
    width: 100%;
    height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: #e8e8e8;
}

.main {
    position: relative;
    display: flex;
    flex-direction: column;
    background-color: #240046;
    max-height: 450px;
    width: 400px;
    overflow: hidden;
    border-radius: 12px;
    box-shadow: rgba(59, 0, 130, 0.442) 0px 30px 90px;
}

.form {
    display: flex;
    flex-direction: column;
    gap: 5px;
    padding: 24px;
}

/*checkbox to switch from sign up to login*/

#chk {
    display: none;
}

/*Login*/

.login {
    position: relative;
    width: 100%;
    height: 100%;
}
a
{ 
    
    color:white;
    text-decoration: none;
}
a:hover 
{
    color:black;
}

.login label {
    margin: 5% 0 5%;
}

label {
    color: #fff;
    font-size: 2rem;
    justify-content: center;
    display: flex;
    font-weight: bold;
    cursor: pointer;
    transition: .5s ease-in-out;
}

.input {
    width: 100%;
    height: 40px;
    font-size: 1rem;
    background: #e0dede;
    padding: 10px;
    margin-top: 15px;
    border: none;
    outline: none;
    border-radius: 4px;
}

/*Register*/

.register {
    background: #eee;
    border-radius: 60% / 10%;
    transition: .8s ease-in-out;
}

.register label {
    color: #573b8a;
    transform: scale(.6);
}

#chk:checked ~ .register {
    transform: translateY(-68%);
}

#chk:checked ~ .register label {
    transform: scale(1);
    margin-bottom: .5rem;
}

#chk:checked ~ .login label {
    transform: scale(.6);
}   

/*Button*/

.form button {
    width: 70%;
    height: 40px;
    margin: 15px auto 10%;
    color: #fff;
    background: #573b8a;
    font-size: 1rem;
    font-weight: bold;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: .2s ease-in;
}

.form button:hover {
    background-color: #6d44b8;
}</style>
</head>
<body>
    <div class="container">
        <div class="main">  	
            <input type="checkbox" id="chk">
    
            <div class="login">
                <form class="form" action="login.php" method="POST">
                    <label for="chk" aria-hidden="true">Log in</label>
                    <input class="input" type="email" name="username" placeholder="Email" required>
                    <input class="input" type="password" name="password" placeholder="Password" required>
                    <a href="forgetpass.php">Change Password?</a>
                    <button type="submit" name="login">Log in</button>
                </form>
            </div>
    
            <div class="register">
                <form class="form" action="login.php" method="POST">
                    <label for="chk" aria-hidden="true">Register</label>
                    <input class="input" type="text" name="name" placeholder="Name" required>
                    <input class="input" type="email" name="username" placeholder="Username" required>
                    <input class="input" type="password" name="password" placeholder="Password" required>
                    <input class="input" type="password" name="confirm_password" placeholder="Confirm_Password" required>
                    <button type="submit" name="register">Register</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
<?php
@include 'conect.php';
if(isset($_POST["login"]))
{
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM `users` WHERE `username` = ? AND `password` = ?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows > 0)
    {
        header("location: tr1.html");
        exit();
    }
    else
    {
        echo "<script>alert('Invalid username or password')</script>";
    }
}
?>

<?php
@include 'conect.php';
if(isset($_POST["register"]))
{
    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $cpass = $_POST['confirm_password'];

    if($password == $cpass)
    {
        $stmt = $conn->prepare("INSERT INTO `users`(`name`, `username`, `password`) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $username, $password);
        $stmt->execute();
        header('location:login.php');
    }
    else
    {
        echo "<script>alert('Password does not match')</script>";
    }
}
?>
