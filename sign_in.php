<!DOCTYPE html>
<html lang="en">


<?php require 'includes/head.php'?>

<body class="d-flex flex-column">

<!-- navigation -->
<?php require 'includes/navigation.php' ?>


  <!-- Header -->
  <header class="bg-primary py-5 mb-5">
    <div class="container h-100">
      <div class="row h-100 align-items-center">
        <div class="col-lg-12">
          <strong class="display-4 text-white mt-5 mb-2">Sign In</strong>
        </div>
      </div>
    </div>
  </header>

   <!-- Page Content -->
  <div class="container">

   
  <form class="container" action="db/sign_in.php" method="POST">

   <div class="form-group">
   <label for="inputLoginName">Login Name</label>
       <input type="text" name="login_name" class="form-control" id="inputLoginName" placeholder="Login Name" required maxlength="45" minlength="8">
   </div>

   <div class="form-group">
   <label for="inputPassword4">Login Password</label>
       <input type="password" name="login_password" class="form-control" id="inputPassword4" placeholder="Login Password" required maxlength="45" minlength="8">
   </div>
   <div class="custom-control custom-checkbox">
    <input type="checkbox" class="custom-control-input" name="super_user" id="customCheck1">
    <label class="custom-control-label"  for="customCheck1">Sign in as a super user</label>
  </div>

  <br>

   <button type="submit" class="btn btn-primary">Sign in</button>
   <br><br>

   <p>Don't have an account yet? <a href="sign_up.php">Sign up</a> here.<p/>
 </form>
  

        
 </div>
       

  <!-- Footer -->
<?php require 'includes/footer.php' ?>

</body>

</html>
