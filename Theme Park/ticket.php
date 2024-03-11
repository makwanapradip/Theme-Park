<?php

session_start();

$offers = array(
    'OFFER10' => 10,
    'OFFER20' => 20,
    'NOOFFER' => 0
);

function calculateDiscount($price, $offer) {
    global $offers;

    if (isset($offers[$offer])) {
        $discountPercent = $offers[$offer];
        $discountedPrice = $price - ($price * $discountPercent / 100);
        return $discountedPrice;
    } else {
        return $price;
    }
}

function displayOffers() {
    global $offers;

    echo "<ul class='offers-list'>";
    foreach ($offers as $code => $discount) {
        echo "<li>$code: $discount% off</li>";
    }
    echo "</ul>";
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $selectedOffer = $_POST['offer'];
    $ticketQuantity = intval($_POST['quantity']);
    $ticketPrice = 50; // Assuming a fixed price of $50 per ticket

    if (!array_key_exists($selectedOffer, $offers)) {
        echo "<p class='error'>Invalid offer selected. Please try again.</p>";
    } elseif ($ticketQuantity <= 0) {
        echo "<p class='error'>Invalid quantity. Please enter a valid number of tickets.</p>";
    } else {
        $totalPrice = $ticketPrice * $ticketQuantity;
        $finalPrice = calculateDiscount($totalPrice, $selectedOffer);

        echo "<p class='success'>Number of Tickets: $ticketQuantity</p>";
        echo "<p class='success'>Total Price: $$totalPrice</p>";
        echo "<p class='success'>Selected Offer: $selectedOffer</p>";
        echo "<p class='success'>Final Price after Discount: $$finalPrice</p>";

        // Display the generated ticket
        echo "<div class='ticket'>";
        echo "<h2>Ticket Information</h2>";
        echo "<p><strong>Number of Tickets:</strong> $ticketQuantity</p>";
        echo "<p><strong>Total Price:</strong> $$totalPrice</p>";
        echo "<p><strong>Selected Offer:</strong> $selectedOffer</p>";
        echo "<p><strong>Final Price after Discount:</strong> $$finalPrice</p>";
        echo "</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Theme Park Ticket Booking</title>
    <link rel="stylesheet" href="tr1.css"> 
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            text-align: center;
            margin: 50px;
        }

        h1 {
            color: #333;
        }

        form {
            max-width: 400px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 20px;
            box-sizing: border-box;
        }

        .offers-list {
            list-style: none;
            padding: 0;
            text-align: left;
            margin-bottom: 20px;
        }

        .offers-list li {
            margin-bottom: 5px;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .error {
            color: #ff0000;
            font-weight: bold;
        }

        .success {
            color: #4caf50;
            font-weight: bold;
        }

        .ticket {
            background-color: #eee;
            padding: 15px;
            border-radius: 8px;
            margin-top: 20px;
        }
    </style>
    <!-- <link rel="stylesheet" href="st.css"> -->
</head>
<body>


<!-- 
    <h1>Theme Park Ticket Booking</h1>
    <form method="post" action="">
        <label for="quantity">Number of Tickets:</label>
        <input type="number" name="quantity" required min="1"><br>

        

        <label for="offer">Select an Offer:</label>
        <input type="text" name="offer" placeholder="Enter offer code"><br>

        <input type="submit" value="Book Now">
    </form> -->
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Theme Park Ticket Booking</title>
    <style>
        /* Your CSS styles */
    </style>
</head>
<body>
    <h1>Theme Park Ticket Booking</h1>
    <form method="post" action="">
        <label for="quantity">Number of Tickets:</label>
        <input type="number" name="quantity" required min="1"><br>

        <?php displayOffers(); ?>

        <label for="offer">Select an Offer:</label>
        <select name="offer" required>
            <option value="">Select an offer</option>
            <?php
            foreach ($offers as $code => $discount) {
                echo "<option value='$code'>$code - $discount% off</option>";
            }
            ?>
        </select><br>

        <input type="submit" value="Book Now" href="printticket.php">
    </form>
</body>
</html>

    <nav>

    </nav>
</body>
</html>
