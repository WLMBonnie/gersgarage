<!DOCTYPE html>
<html lang="en">


<?php require 'includes/head.php'?>
<?php require 'security.php'?>
<?php require 'db/customer_data.php'?>
<body class="d-flex flex-column">

  <!-- Navigation -->
  <?php require 'includes/navigation.php'?>


  <!-- Header -->
  <header class="bg-primary py-5 mb-5">
    <div class="container h-100">
      <div class="row h-100 align-items-center">
        <div class="col-lg-12">
          <strong class="display-4 text-white mt-5 mb-2">Last Booking</strong>
        </div>
      </div>
    </div>
  </header>

   <!-- Page Content -->
  <div class="container">

    <div class="row">
    <div class="col-md-12 mb-5">
    
        <?php 
            if($records){
            $booking = $records[0];
        
            //[app_id] => 1 [cus_id] => 1 [staff_id] => [engine_type] => diesel [service_type] => Annual Service [vechicle_licence] => abcd [note] => jhgfh [status] => Booked [date] => 0000-00-00 00:00:00 [vehicle_make] => Fiat [vehicle_type] => Small Van
            $date = date_parse($booking['date']);
            
            
            
            echo "<table><tr>";
            echo "<td>Customer Name </td><td>" . $booking['f_name'] . " " . $booking['l_name'] .  "</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td>Appointment Date </td><td>" . $date['year'] . "-" . $date["month"] . "-" . $date["day"] . "</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td>Service Type</td><td>" . $booking['service_type'] .  "</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td>Vehicle Type </td><td>" . $booking['vehicle_type'] . "</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td>Vehicle Make </td><td>" . $booking['vehicle_make'] . "</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td>Engine Type </td><td>" . $booking['engine_type'] . "</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td>Vehicle License </td><td>" . $booking['vechicle_licence'] . "</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td>Notes</td><td>" . $booking['note'] .  "</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td>Status</td><td>" . $booking['status'] .  "</td>";
            echo "</tr></table><br><br>";
            echo "<p><a class=\"btn btn-primary\" href=\"index.php\">Back to Home</a></p>";

            }else{
              echo "<p>Book your first appointment online.</p>";
              echo "<a class=\"btn btn-primary\" href=\"booking.php\">Book Now</a>";
            }
        ?>
        

        <br>
         
      </div>  
    

         
     </div>
    </div>
      
    <br>
    <br>
        
  <!-- /.container -->

  <!-- Footer -->
<?php require 'includes/footer.php' ?>

</body>

</html>
