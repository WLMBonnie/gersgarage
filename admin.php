<!DOCTYPE html>
<html lang="en">


<?php require 'includes/head.php'?>
<?php require 'admin_security.php'?>
<?php require 'db/admin_booking_data.php'?>

<body class="d-flex flex-column">
<script>
var services = <?php echo $servicesJson?>;
var staffs = <?php echo $staffJson ?>;
$( function() {
    $( "#inputDate" ).datepicker({
      dateFormat: "yy-mm-dd"
    });
  } );


  function changeDate(){
    window.location.href = '/gersgarage/admin.php?date=' + $("#inputDate").val();
  }

  function print_schedule(){
  $('.print-hidden').hide();
  window.print();
  $('.print-hidden').show();
  }

  function validate(){
    var result = true;
    var staffCount = {};
    for(staff of $('[name="app_staff[]"]')){
      var appStaffVal = $(staff).val();
      if(!appStaffVal)
        continue;
      var app_staff = appStaffVal.split('_');
      var appId = app_staff[0];
      var staffId = app_staff[1];
      
      var serviceType = $('#' + appId + "_service_type").val();
      var serviceworkload = services[serviceType];

      if(staffCount[staffId]){
        staffCount[staffId] = staffCount[staffId] + serviceworkload;
      }else{
        staffCount[staffId] = serviceworkload;
      }
      
    }

    console.log(staffCount);
    for(id in staffCount){
      var workload = staffs[id]['workload'];
      if(staffCount[id] > workload){
        var name = staffs[id]['name'];
        var msg = name + " has too much work. Please reduce workload of " + name;
        msg += "\nTotal workload of assigned services shouldn't exceed maximum workload of staff.";
        msg += "\n" + name + "'s maximum workload is " + workload;
        alert(msg);
        result = false;
      }
    }
    
    return result;
  }

  function formSubmit(){
    if(validate()){
      $('#submit-btn').click();
    }
  }
</script>
  <!-- Navigation -->
  <?php require 'includes/navigation.php'?>


  <!-- Header -->
  <header class="bg-primary py-5 mb-5">
    <div class="container h-100">
      <div class="row h-100 align-items-center">
        <div class="col-lg-12">
          <strong class="display-4 text-white mt-5 mb-2">Admin</strong>
        </div>
      </div>
    </div>
  </header>

   <!-- Page Content -->
  <div class="container">

    <div class="row">
    <div class="col-md-12 mb-5">
    <h2>Booking on <?php echo $date?></h2>

    <div class="form-row print-hidden">
  
      <label for="inputDate">See bookings on other date</label>
      <input type="text" name="date" class="form-control" id="inputDate" placeholder="Date" onchange="changeDate();" readonly="readonly"   style="background:white;">
      
    </div>
    
  

   
    <form action="db/admin_booking.php" method="POST">
    <input type="hidden" value="<?php echo $date?>" name="date">
    <div class="table-responsive">
        <table class="table table-striped">
        <?php 
            
            $arrlength = count($appointments);
            if($arrlength > 0){
            
            echo "<tr>";
            echo "<th>Customer Name</th><th>Service (workload)</th><th>Vehicle</th><th>Status</th><th>Staff</th><th class=\"print-hidden\">Invoice</th>";
            echo "</tr>";
            
            
            $stafflength = count($staffs);

            for($x = 0; $x < $arrlength; $x++) {
                $booking = $appointments[$x];

                echo "<tr>";
                echo "<td>" . $booking['f_name'] . " " . $booking['l_name'] .  "</td>";
                echo "<td>" . $booking['service_type'] . "(" .$services[$booking['service_type']]['workload'] . ")</td>";
                echo "<input type=\"hidden\" id=\"" . $booking['app_id'] . "_service_type\" value=\"" . $booking['service_type'] . "\">";
                echo "<td>" . $booking['vehicle_type'] . " / " . $booking['vehicle_make'] . " / " . $booking['engine_type'] .  "</td>";      
                
                echo "<td><select name=\"app_status[]\">";
                echo "<option value=\"" . $booking['app_id'] . "_" . "Booked\" "; 
                echo $booking['status'] == 'Booked' ? 'selected' : '';
                echo " >Booked</option>";
                
                echo "<option value=\"" . $booking['app_id'] . "_" . "In Service\" "; 
                echo $booking['status'] == 'In Service' ? 'selected' : '';
                echo " >In Service</option>";

                echo "<option value=\"" . $booking['app_id'] . "_" . "Completed\" "; 
                echo $booking['status'] == 'Completed' ? 'selected' : '';
                echo " >Completed</option>";

                echo "<option value=\"" . $booking['app_id'] . "_" . "Collected\" "; 
                echo $booking['status'] == 'Collected' ? 'selected' : '';
                echo " >Collected</option>";

                echo "<option value=\"" . $booking['app_id'] . "_" . "Unrepairable\" "; 
                echo $booking['status'] == 'Unrepairable' ? 'selected' : '';
                echo " >Unrepairable</option>";
                
                echo "</select></td>";
                
                echo "<td><select name=\"app_staff[]\">";
                echo "<option selected value=\"\">Assign</option>";

                for($y = 0; $y < $stafflength; $y++) {
                    $staff = $staffs[$y];
                    echo "<option value=\"" . $booking['app_id'] . "_" . $staff['staff_id'] . "\" ";
                    echo $booking['staff_id'] == $staff['staff_id'] ? 'selected' : '';
                    echo " >" . $staff['name'] . "</option>";
                }

                echo "</select></td>";
                echo "<td class=\"print-hidden\"><a class=\"btn btn-primary\" href=\"invoice.php?app_id=" . $booking['app_id'] . "&cus_id=" . $booking['cus_id'] . "\">Issue</a></td>";
                echo "</tr>";
            }
            
          }else{
            echo "<p><h4>No booking today.</h4></p>";
          }
   
        ?>
        <br> 

        </table>
          </div>
        <br>
        <button type="button" onclick="formSubmit()" class="btn btn-primary print-hidden">Submit</button>
        <button type="submit" id="submit-btn" style="display:none">Hidden Submit</button>
        

        <br>
        <br>
        <button id="print_btn" type="button" class="btn btn-secondary print-hidden" onclick="print_schedule()">Print</button>
          <a class="btn btn-secondary print-hidden" href="index.php">Back to Home</a>
          </form>
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
