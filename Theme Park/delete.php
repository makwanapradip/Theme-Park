<?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "project";
    $conn = mysqli_connect($host, $user, $pass, $db);

    if(isset($_GET['id'])) {
        $id = mysqli_real_escape_string($conn, $_GET['id']);

        $sql = "DELETE FROM ticket_bookings WHERE id = $id";

        if(mysqli_query($conn, $sql)) {
            header("Location: adm.php");
            exit();
        } else {

            echo "Error: " . mysqli_error($conn);
        }
    } else {
        header("Location: admin.php");
        exit();
    }
?>

