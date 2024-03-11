
<?php
// @include('conect.php');
// $id = $_GET['id'];

// $sql = "select * from ticket_bookings where id = '$id'";

// $run = mysqli_query($connection,$sql);


// while($row=mysqli_fetch_array($run))
// {


//     $id = $row['id'];
//     $name = $row['name'] ;
//     $mobile = $row['mobile'];
//     $email = $row['email'];
//     $date = $row['date'];

//    $adultQuantity = $row['adult_quantity'];
//    $childQuantity = $row['child_quantity'];
//    $adultOffer = $row['adult_offer'];
//    $childOffer = $row['child_offer'];


// }

?>

<?php
@include('conect.php');

if(isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "select * from ticket_bookings where id = '$id'";
    $run = mysqli_query($conn, $sql);

    if($run) { // Check if query executed successfully
        $row = mysqli_fetch_array($run);

        // Check if $row is not empty
        if($row) {
            $id = $row['id'];
            $name = $row['name'];
            $mobile = $row['mobile'];
            $email = $row['email'];
            $date = $row['date'];
            $adultQuantity = $row['adult_quantity'];
            $childQuantity = $row['child_quantity'];
            $adultOffer = $row['adult_offer'];
            $childOffer = $row['child_offer'];
        }
         else
         {
            echo "No record found!";
        }
    }  else{
        echo "Error executing query: " . mysqli_error($conn);
    }
}


    if(isset($_POST['submit']))
        {
          $id = $_GET['id'];  


          $name = $_POST['name'] ;
          $mobile = $_POST['mobile'];
          $email = $_POST['email'];
          $date = $_POST['date'];
      
         $adultQuantity = $_POST['adult_quantity'];
         $childQuantity = $_POST['child_quantity'];
         $adultOffer = $_POST['adult_offer'];
         $childOffer = $_POST['child_offer'];

           $sql = "update ticket_bookings set name= '$name',mobile='$mobile',email='$email',date='$date',adult_quantity='$adultQuantity',child_quantity='$childQuantity',adult_offer='$adultOffer',child_offer='$childOffer' where id =  '$id'";

           if(mysqli_query($conn,$sql))
           {

            echo '<script> location.replace("admin.php")</script>';  
           }
           else
           {
           echo "Some thing Error" . $conn->error;

           }

        }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Ticket Booking</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .container h1 {
            text-align: center;
            color: #007bff;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }
        input[type="text"],
        input[type="email"] {
            width: calc(100% - 22px);
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ced4da;
            box-sizing: border-box;
        }
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit Ticket Booking</h1>
        <form action="edit.php?id=<?php echo isset($id) ? $id : ''; ?>" method="post">

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" placeholder="Enter Name" value="<?php echo isset($name) ? $name : ''; ?>">

            </div>
            <div class="form-group">
                <label for="mobile">Mobile</label>
                <input type="text" id="mobile" name="mobile" placeholder="Enter Mobile" value="<?php echo isset($mobile) ? $mobile : ''; ?>">

            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter Email" value="<?php echo isset($email)? $email: ''; ?>">
            </div>
            <div class="form-group">
                <label for="date">Date</label>
                <input type="text" id="date" name="date" placeholder="Enter Date" value="<?php echo isset($date)? $date: ''; ?>">
            </div>
            <div class="form-group">
                <label for="adult_quantity">Adult Quantity</label>
                <input type="text" id="adult_quantity" name="adult_quantity" placeholder="Enter Adult Quantity" value="<?php echo isset($adultQuantity)?$adultQuantity: ''; ?>">
            </div>
            <div class="form-group">
                <label for="child_quantity">Child Quantity</label>
                <input type="text" id="child_quantity" name="child_quantity" placeholder="Enter Child Quantity" value="<?php echo isset($childQuantity)?$childQuantity: ''; ?>">
            </div>
            <div class="form-group">
                <label for="adult_offer">Adult Offer</label>
                <input type="text" id="adult_offer" name="adult_offer" placeholder="Enter Adult Offer" value="<?php echo isset($adultOffer)?$adultOffer: ''; ?>">
            </div>
            <div class="form-group">
                <label for="child_offer">Child Offer</label>
                <input type="text" id="child_offer" name="child_offer" placeholder="Enter Child Offer" value="<?php echo isset($childOffer)?$childOffer: ''; ?>">
            </div>
            <input type="submit" name="submit" value="Edit">
        </form>
    </div>
</body>
</html>
