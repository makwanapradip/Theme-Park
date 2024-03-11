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

    echo "<select name='offer' required>";
    echo "<option value=''>Select an offer</option>";
    foreach ($offers as $code => $discount) {
        echo "<option value='$code'>$code - $discount% off</option>";
    }
    echo "</select>";
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
        $_SESSION['selected_offer'] = $selectedOffer;
        $_SESSION['ticket_quantity'] = $ticketQuantity;
        header("Location: print_ticket.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Theme Park Ticket Booking</title>
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

        input, select {
            width: 100%;
            padding: 8px;
            margin-bottom: 20px;
            box-sizing: border-box;
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
    </style>
</head>
<body>
    <h1>Theme Park Ticket Booking</h1>
    <form method="post" action="">
        <label for="quantity">Number of Tickets:</label>
        <input type="number" name="quantity" required min="1"><br>

        <label for="offer">Select an Offer:</label>
        <?php displayOffers(); ?><br>

        <input type="submit" value="Book Now">
    </form>
</body>
</html>
