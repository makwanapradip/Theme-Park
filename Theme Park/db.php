<?php
// Database connection parameters
/*($host = 'localhost';
$db = 'project';
$user = 'root';
$pass = '';

// Connect to the database
$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// User registration
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['register'])) {
    $username = $_POST['reg_username'];
    $password = password_hash($_POST['reg_password'], PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $password);

    if ($stmt->execute()) {
        echo "Registration successful!";
    } else {
        echo "Registration failed. Please try again.";
    }

    $stmt->close();
}

// User login
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    $username = $_POST['login_username'];
    $password = $_POST['login_password'];

    $stmt = $conn->prepare("SELECT id, password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($id, $hashedPassword);
    $stmt->fetch();

    if (password_verify($password, $hashedPassword)) {
        echo "Login successful! User ID: " . $id;
    } else {
        echo "Invalid username or password.";
    }

    $stmt->close();
}

$conn->close();
?>*/
