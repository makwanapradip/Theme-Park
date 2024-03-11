

<?php
session_start();

$adultOffers = array(
    
    'NOOFFER' => 0
);

$childOffers = array(
    'CHILD10' => 10,
    'CHILD20' => 20,
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

function displayPriceWithRupeeSymbol($price) {
    // Prepend Rupee symbol (₹) to the price and return
    return '₹' . $price;
}

function displayOffers($ticketType) {
    global $adultOffers, $childOffers;

    $offers = ($ticketType === 'adult') ?   $adultOffers : $childOffers;

    echo "<ul class='offers-list'>";
    foreach ($offers as $code => $discount) {
        echo "<li>$code: $discount% off</li>";
    }
    echo "</ul>";
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $Address = $_POST['Address'];
    $date = $_POST['date']; 
    $adultQuantity = intval($_POST['adult_quantity']);
    $childQuantity = intval($_POST['child_quantity']);
    $adultOffer = $_POST['adult_offer'];
    $childOffer = $_POST['child_offer'];
    
    
    $_SESSION['name'] = $name;
    $_SESSION['mobile'] = $mobile;
    $_SESSION['email']=$email;
    $_SESSION['Address']=$Address;
    $_SESSION['date'] = $date;
    $_SESSION['adult_quantity'] = $adultQuantity;
    $_SESSION['child_quantity'] = $childQuantity;
    $_SESSION['adult_offer'] = $adultOffer;
    $_SESSION['child_offer'] = $childOffer;

    // Assuming prices are in Rupees (₹)
    $adultPrice = 1000; // Assuming a fixed price of ₹1000 for adult tickets
    $childPrice = 700; // Assuming a fixed price of ₹700 for child tickets

    $adultTotalPrice = $adultPrice * $adultQuantity;
    $childTotalPrice = $childPrice * $childQuantity;


    
    $adultFinalPrice = calculateDiscount($adultTotalPrice, $adultOffer);
    $childFinalPrice = calculateDiscount($childTotalPrice, $childOffer);
    $Total_Amount = $adultFinalPrice + $childFinalPrice;

    // echo "Total Price for Adult Tickets: " . displayPriceWithRupeeSymbol($adultFinalPrice) . "<br>";
    // echo "Total Price for Child Tickets: " . displayPriceWithRupeeSymbol($childFinalPrice) . "<br>";
    echo "Total Price for Both Tickets: " . displayPriceWithRupeeSymbol($Total_Amount) . "<br>";
    //inser databbase 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "project";
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
    $sql="INSERT INTO `ticket_bookings`( `name`, `mobile`,`email`, `adult_tickets`, `adult_offer`, `child_tickets`, `child_offer`, `booking_date`) VALUES ('$name', '$mobile','$email', '$adultQuantity', '$adultOffer', '$childQuantity', '$childOffer','$date')";
    $result=mysqli_query($conn,$sql);
    if($result)
    {
    echo "<script>alert('data inserted..');</script>";
    }
    else{
        echo "<script>alert('data not inserted..');</script>";    
    }
    // Redirect to print_ticket.php
   header("Location: pr_ticket.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   
    <title>Theme Park Ticket Booking</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    text-align: center;
    margin: 50px;
}

h1 {
    color: #333;
}

form {
    max-width: 600px;
    margin: 0 auto;
    background-color: black;
    color: white;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

label {
    display: block;
    margin-bottom: 10px;
}

input[type="text"],
input[type="number"],
select {
    width: calc(100% - 20px);
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
input[type="submit"]:hover
{
    background-color: #333 ;
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

table {
    width: 100%;
    border-collapse: collapse;
}

table th,
table td {
    padding: 8px;
    border: 1px solid #ddd;
}

table th {
    background-color: #f2f2f2;
    font-weight: bold;
}

table td {
    text-align: center;
} */

    </style>
</head>
<body>
    <h1>Theme Park Ticket Booking</h1>
    <form method="post" action="tik.php">
        
        <label for="name">Name:</label>
        <input type="text" name="name" placeholder="Enter your name"required>

        <label for="mobile">Mobile Number:</label>
        <input type="number" name="mobile" placeholder="Enter your Phone no" required><br>

        
        <label for="email">Email:</label>
        <input type="text" name="email" placeholder="Enter your email" required><br>
        
        <label for="email">Address:</label>
        <input type="text" name="Address" placeholder="Enter your Address" required><br>
        
        <label for="book_date">Booking Date:</label>
         <input type="date" name="date" required><br><br>
         <h3>Adult Price: ₹1000</h3>
         <h3>Child Price: ₹700</h3>

                 <label for="adult_quantity">Number of Adult Tickets:</label>
        <input type="number" name="adult_quantity" placeholder="Enter number of Adult" required min="0"><br>


        <?php displayOffers('adult'); ?>

        <label for="adult_offer">Select an Offer for Adult:</label>
        <select name="adult_offer" required>
            <option value="">Select an offer for adult</option>
            <?php
            foreach ($adultOffers as $code => $discount) {
                echo "<option value='$code'>$code - $discount% off (Adult)</option>";
            }
            ?>
        </select><br>

        <label for="child_quantity">Number of Child Tickets:</label>
        <input type="number" name="child_quantity" placeholder="Enter number of child" required min="0"><br>

        <?php displayOffers('child'); ?>

        <label for="child_offer">Select an Offer for Child:</label>
        <select name="child_offer" required>
            <option value="">Select an offer for child</option>
            <?php
            foreach ($childOffers as $code => $discount) {
                echo "<option value='$code'>$code - $discount% off (Child)</option>";
            }
            ?>
        </select><br>

        <input type="submit"   value="Book Now">
    </form>
</body>
</html>



