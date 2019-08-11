<!DOCTYPE html>
<html lang="en">


<?php require 'includes/head.php'?>
<?php require 'db/booking_data.php'?>

<body class="d-flex flex-column">
<div id="page-content">
<script>
  var cars = <?php echo $_SESSION['cars'] ?>;
  var vans = <?php echo $_SESSION['vans'] ?>;
  var buses = <?php echo $_SESSION['buses'] ?>;
  var bikes = <?php echo $_SESSION['bikes'] ?>;

  $( function() {
    $( "#inputDate" ).datepicker({
      dateFormat: "yy-mm-dd"
    });
  } );

  function changeMake(){
    var type = $('#inputVehicleType').val();
    var html = '';
    if(type == 'Car'){
      html = genMakeOptions(cars);
    }else if(type == 'Motorbike'){
      html = genMakeOptions(vans);
    }else if(type == 'Small Van'){
      html = genMakeOptions(buses);
    }else if(type == 'Small Bus'){
      html = genMakeOptions(bikes);
    }

    $('#inputVehicleMake').html(html);
  }
  
  function genMakeOptions(make){
    var html = '<option selected value="">Select a vehicle make<option>';
    for(var i = 0; i < make.length; i++){
      html += '<option value="' + make[i] + '">' + make[i] + '</option>'; 
    }
    return html;
  }
</script>

  <!-- Navigation -->
  <?php require 'includes/navigation.php'?>


  <!-- Header   -->
  <header class="bg-primary py-5 mb-5">
    <div class="container h-100">
      <div class="row h-100 align-items-center">
        <div class="col-lg-12">
          <strong class="display-4 text-white mt-5 mb-2">Online Booking</strong>
        </div>
      </div>
    </div>
  </header>

    <!-- Page Content -->
  <div class="container">

    <div class="row">
      <div class="col-md-12 mb-5">
        <h2>Online Booking</h2>
        <hr>
       <p>Make Your Online Booking Immediately!</p>

        <p>We offer mechanical services, window replacement, wheels and tyre fitting, auto electrics and many more specialist services. Most work is done and vehicle’s returned in one day.</p>
        
      </div>  
    
      <?php
        if(isset($_SESSION["login_status"]) && $_SESSION["login_status"] = "success"){
      ?>
    
 <form class="container" action="db/booking.php" method="POST">

  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputDate">Date</label>
      <input type="text" name="appointment_date" class="form-control" id="inputDate" placeholder="Date">
    </div>
    <div class="form-group col-md-6">
    <label for="inputService">Service Type </label>
    <select name="service_type" id="inputService" class="custom-select">
      <option selected value="">Select a service type<option>
      <option value="Annual Service">Annual Service<option>
      <option value="Major Service">Major Service<option>
      <option value="Repair / Fault">Repair / Fault<option>
      <option value="Major Repair">Major Repair<option>
    </select>
    </div>
  </div>

  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputVehicleType">Vehicle Type</label>
      <select name="vehicle_type" id="inputVehicleType" class="custom-select" onchange="changeMake()">
        <option selected value="">Select a Vehicle Type<option>
        <option value="Car">Car<option>
        <option value="Motorbike">Mototbike<option>
        <option value="Small Van">Small Van<option>
        <option value="Small Bus">Small Bus<option>
    </select>
    </div>
    <div class="form-group col-md-6">
    <label for="inputVehicleMake">Vehicle Make </label>
    <select name="vehicle_make" id="inputVehicleMake" class="custom-select">
      <option selected value="">Select a Vehicle Type First<option>
    </select>
    </div>
  </div>

  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputVehicleLicense">Vehicle License</label>
      <input type="text" name="vehicle_license" class="form-control" id="inputDate" placeholder="Vehicle License">
    </div>
    <div class="form-group col-md-6">
    <label for="inputVehicleEngine">Vehicle Engine</label>
    <select name="vehicle_engine" id="inputVehicleEngine" class="custom-select">
      <option selected value="">Select a Vehicle Engine<option>
        <option value="diesel">diesel</option>
        <option value="petrol">petrol</option>
        <option value="hybrid">hybrid</option>
        <option value="electric">electric</option>
    </select>
    </div>
  </div>

  <div class="form-group">
      <label for="inputNote">Note</label>
      <textarea type="text" name="note" class="form-control" id="inputNote" placeholder="Note"></textarea>
    </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>
        <?php }else { ?>
          
          <p>
            Sign in now to book your appointment.
            <a href="/sign_in.php">Sign In Here</a>
          </p>
        <?php } ?>?

        
</div>
</div>
      


    <br>
    <br>
        
  <!-- /.container -->

  <!-- Footer -->
<?php require 'includes/footer.php' ?>
        </div>
</body>

</html>
