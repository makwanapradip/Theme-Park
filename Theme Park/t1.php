<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Theme Park Ticket Booking</title>
    <style>
        .ticket{
            margin-left: 600px;
            margin-top: 250px;
        }
        .ticket h2{
            font-size: 36px;
        }
        .ticket label{
            font-size: 20px;
        }
        .ticket input{
            height: 20px;
            width:500px;
            border: 1px solid black;
            border-radius: 5px;
            border-style: inset;
        }
        .ticket select {
            height: 25px;
            width: 500px;
            border: 1px solid black;
            border-radius: 5px;
        }
        .ticket button{
            margin-left: 200px;
            margin-top: 20px;
            width: 100px;
            height: 25px;
            background-color: aquamarine;
            border: 2px black solid;
            border-radius: 5px;
        }
        .ticket button:hover{
            background-color: chartreuse;
        }
    </style>    
</head>
<body>
    <div class="ticket">
    <h2>Book Tickets</h2>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <?php
        $servername = "localhost";
        $username = "root"; // Your MySQL username
        $password = ""; // Your MySQL password
        $dbname = "project";

        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Retrieve offers from database
        $sql = "SELECT * FROM offers";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<h2>Current Offers</h2>";
            echo "<select name='offer'>";
            while ($row = $result->fetch_assoc()) {
                echo "<option value='" . $row["id"] . "'>" . $row["title"] . " (Discount: " . $row["discount"] . "%)</option>";
            }
            echo "</select><br>";
        } else {
            echo "No offers available at the moment.";
        }
        ?>
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" required><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br>
        <label for="tickets">Number of Tickets:</label><br>
        <input type="number" id="tickets" name="tickets" required><br>
        <label for="No_Adult">Number of Adult Tickets:</label><br>
        <input type="number" id="No_Adult" name="No_Adult" required><br>
        <label for="No_Child">Number of Child Tickets:</label><br>
        <input type="number" id="No_Child" name="No_Child" required><br>
        <button type="submit">Book Ticket</button>
    </form>
    </div>
</body>
</html>
