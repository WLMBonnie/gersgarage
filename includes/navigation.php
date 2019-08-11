<!-- Navigation -->
<div id="page-content">
  
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="index.php"> The Ger's Garage Limited</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
        aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <!-- <li class="nav-item active"> -->
            <a class="nav-link" href="index.php">Home
            </a>
          </li>

          <!-- a menu item https://getbootstrap.com/docs/4.0/components/dropdowns/?#menu-items-->
          <li>
            <div class="dropdown">
              <button class="btn nav-link dropdown-toggle sub-menu-button-color" type="button" id="dropdownMenu2"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Our Services
              </button>
              <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                <a href="sub_services.php"> <button class="dropdown-item" type="button">Car Repairs &amp;
                    Services</button></a>
                <a href="sub_parts.php"><button class="dropdown-item" type="button">Car Parts</button></a>
                <a href="sub_diagnostic.php"><button class="dropdown-item" type="button">Car Diagnostic</button></a>
              </div>
            </div>
          </li>
          <li>
          <li class="nav-item">
            <a class="nav-link" href="booking.php">Online Booking</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.php">About</a>
          </li>
          <?php
            if(isset($_SESSION['login_status']) && $_SESSION["login_status"] == 'success'){
          ?>
          <li class="nav-item">
            <div class="dropdown">
              <button class="btn nav-link dropdown-toggle sub-menu-button-color" type="button" id="dropdownMenu2"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Hi, <?php echo $_SESSION["username"] ?>!
              </button>
              <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                <?php if(isset($_SESSION['staff_role']) && $_SESSION['staff_role'] == 'SuperUser'){
                    echo '<a href="admin.php"> <button class="dropdown-item" type="button">Admin</button></a>';
                }else{
                  echo '<a href="customer.php"> <button class="dropdown-item" type="button">Bookings</button></a>';
                }
                ?>
               
                <a href="sign_out.php"><button class="dropdown-item" type="button">Sign Out</button></a>
                
              </div>
            </div>
            
          </li>

          <?php
            }else{
          ?>
          <li class="nav-item">
            <a class="nav-link" href="sign_in.php">Sign In</a>
          </li>

          <?php
            }
          ?>
        </ul>
      </div>
    </div>
  </nav>
