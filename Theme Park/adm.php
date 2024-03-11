<?php   
                 $host = "localhost";
                 $user = "root";
                 $pass = "";
                 $db = "project";
                $conn = mysqli_connect($host, $user, $pass, $db);

                                $sql = "select * from ticket_bookings";
                                $run = mysqli_query($conn, $sql);
 ?>  


 <!DOCTYPE html>  
 <html>  
 <head>  
      <meta charset="utf-8">  
      <title>Delete Data From Database in PHP</title>  
      <link rel="stylesheet" type="text/css" href="adm.css">  
 </head>  
 <body>  
 <header>Admin Dhasboard</header>  
 <table border="1" cellspacing="0" cellpadding="0">  
      <tr class="heading">  
           <th>Sl No</th>  
           <th>id</th>
                            <th>Name</th>
                            <th>Mobile</th>
                            <th>Email</th>
                            <th>Date</th>
                            <th>Number of Adult</th>
                            <th>Number of Child</th>
                            <th>Adult Selected Offer</th>
                            <th>Child Selected Offer</th>
                            <th>Operation</th>
      </tr>  
      <?php   
      $i=1;  
           if ($num = mysqli_num_rows($run)>0) {  
                while ($result = mysqli_fetch_assoc($run)) {  
                     echo "  
                          <tr class='data'>  
                          <td>".$i++."</td>  
                               <td>".$result['id']."</td>  
                               <td>".$result['name']."</td>  
                               <td>".$result['mobile']."</td>  
                               <td>".$result['email']."</td>  
                               <td>".$result['booking_date']."</td>  
                               <td>".$result['adult_tickets']."</td> 
                               <td>".$result['child_tickets']."</td> 
                               <td>".$result['adult_offer']."</td> 
                               <td>".$result['child_offer']."</td>  
                               <td><a href='delete.php?id=".$result['id']."' id='btn'>Delete</a></td>  
                          </tr>  
                     ";  
                }  
           }  
      ?>  
 </table>  
 </body>  
 </html>  