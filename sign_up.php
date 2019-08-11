<!DOCTYPE html>
<html lang="en">


<?php require 'includes/head.php'?>

<body class="d-flex flex-column">

  <!-- Navigation -->
  <?php require 'includes/navigation.php'?>


  <!-- Header -->
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
        <h2>Register Now!</h2>
        <hr>
       <p>To track your records and get the latest news!</p>
          
      </div>  
    
 <form class="container" action="db/sign_up.php" method="POST">
  
 <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputFirstName">First Name</label>
      <input type="text" name="first_name" class="form-control" id="inputFirstName" placeholder="First Name" required maxlength="45">
    </div>
    <div class="form-group col-md-6">
      <label for="inputLastName">Last Name</label>
      <input type="text" name="last_name" class="form-control" id="inputLastName" placeholder="Last Name" required maxlength="45">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Email</label>
      <input type="email" name="email" class="form-control" id="inputEmail4" placeholder="Email" required maxlength="45">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPhone">Phone</label>
      <input type="number" name="phone" class="form-control" id="inputPhone" placeholder="Phone" required maxlength="45">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputLoginName">Login Name</label>
      <input type="text" name="login_name" class="form-control" id="inputLoginName" placeholder="Login Name" required maxlength="45" minlength="8">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Login Password</label>
      <input type="password" name="login_password" class="form-control" id="inputPassword4" placeholder="Login Password" required maxlength="45" minlength="8">
    </div>
  </div>
  <div class="form-group">
    <label for="inputAddress">Address</label>
    <input type="text" name="address_line1" class="form-control" id="inputAddress" placeholder="Apartment, studio, or floor" maxlength="45">
  </div>
  <div class="form-group">
    <label for="inputAddress2">Address 2</label>
    <input type="text" name="address_line2" class="form-control" id="inputAddress2" placeholder="Street" maxlength="45">
  </div>
  <div class="form-group">
    <label for="inputAddress3">Address 3</label>
    <input type="text" name="address_line3" class="form-control" id="inputAddress3" placeholder="City, County" maxlength="45">
  </div>

  <button type="submit" class="btn btn-primary">Sign up</button>
</form>
 
        
</div>
</div>
      
    <br>
    <br>
        
  <!-- /.container -->

  <!-- Footer -->
<?php require 'includes/footer.php' ?>

</body>

</html>
