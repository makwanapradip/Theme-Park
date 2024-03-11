<?php
session_start();

$selectedOffer = $_SESSION['selected_offer'];
$ticketQuantity = $_SESSION['ticket_quantity'];
$ticketPrice = 50; // Assuming a fixed price of $50 per ticket

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

$totalPrice = $ticketPrice * $ticketQuantity;
$finalPrice = calculateDiscount($totalPrice, $selectedOffer);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket Information</title>
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

        table {
            border-collapse: collapse;
            width: 50%;
            margin: 20px auto;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Ticket Information</h1>
    <table>
        <tr>
            <th>Attribute</th>
            <th>Value</th>
        </tr>
        <tr>
            <td>Number of Tickets</td>
            <td><?php echo $ticketQuantity; ?></td>
        </tr>
        <tr>
            <td>Total Price</td>
            <td>$<?php echo $totalPrice; ?></td>
        </tr>
        <tr>
            <td>Selected Offer</td>
            <td><?php echo $selectedOffer; ?></td>
        </tr>
        <tr>
            <td>Final Price after Discount</td>
            <td>$<?php echo $finalPrice; ?></td>
        </tr>
    </table>
</body>
</html>
