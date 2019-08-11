
<!DOCTYPE html>
<html lang="en">

<!-- head -->
<?php require 'includes/head.php' ?>


<body class="d-flex flex-column">

<!-- navigation -->
<?php require 'includes/navigation.php' ?>

  <!--    carousel picture display-->
  <!--    Reference: https://getbootstrap.com/docs/4.0/components/carousel/-->


  <div class="container">
    <!--        use the default container's style for the carousel -->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active carousel-pic-size">
          <img class="d-block w-100" src="img/car_mechanic_2.jpg" alt="First slide">
          <div class="carousel-caption d-none d-md-block">
            <h4 class="carouselcaption-selfdefined-font-style">Car Repair &amp; Services</h4>
            <!--    <p>Get Quotation</p>-->
          </div>
        </div>
        <div class="carousel-item carousel-pic-size">
          <img class="d-block w-100" src="img/car_parts_2.jpg" alt="Second slide">
          <div class="carousel-caption d-none d-md-block">
            <h4 class="carouselcaption-selfdefined-font-style">Car Parts</h4>
            <!--    <p>Get Quotation</p>-->
          </div>
        </div>
        <div class="carousel-item carousel-pic-size">
          <img class="d-block w-100" src="img/car_diagnostics_1.jpg" alt="Third slide">
          <div class="carousel-caption d-none d-md-block">
            <h4 class="carouselcaption-selfdefined-font-style">Car Diagnostics</h4>
            <!--    <p>Get Quotation</p>-->
          </div>
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </div>

  <!-- Page Content -->
  <div class="container container-mycss">

    <div class="row">
      <div class="col-md-8 mb-5">
        <h2>What We Do</h2>
        <hr>
        <p>The Ger's Garage Limited is specialized in Car Crash Repairing, Panel Beating and Spray Painting, since 2010.
        </p>

        <p>We are providing wide range of services from a small dent or touch up to major collision repair, for all
          kinds of small to medium vehicles, such as Motorbikes, Cars, Small Vans and Small Buses. </p>

        <p>Our garage located in the central area of Dublin, your convenience is important to us. The Ger's Garage
          Limited offers a one-day repairs service for most repairs.</p>

        <p>Our professional team are formed by six highly qualified and experienced technicians and all our work is
          guaranteed to dealer standards. </p>

        <a class="btn btn-primary" href="booking.php">Book Online Now! &raquo;</a>
      </div>
      <div class="col-md-4 mb-5">
        <h2>Contact Us</h2>
        <hr>
        <address>
          <strong>The Ger's Garage Limited</strong>
          <br>30 - 34 Westmoreland St., Dublin 2
          <br>Eircode: D02 HK35
          <br>Ireland
          <br>
        </address>
        <address>
          <abbr title="Phone">T:</abbr>
          +353 - 01 234 5678
          <br>
          <abbr title="Email">E:</abbr>
          <a href="mailto:#">info@gersgarage.com</a>
        </address>

        <strong>Opening Time:</strong>
        <br>Mon-Fri: 9am-6pm
        <br>Sat: 9am-12nn
        <br>Sun: Closed
        <br>

      </div>
    </div>
    <!-- /.row -->

    <div class="row">
      <div class="col-md-4 mb-5">
        <div class="card h-100">
          <img class="card-img-top" src="img/car_repair_1.jpg" alt="Car Repairs & Services">
          <!-- pic size: 300x200 -->
          <div class="card-body">
            <h4 class="card-title">Car Repairs &amp; Services</h4>
            <p class="card-text">Our expert mechanics provide you full range of services and repairs, such as:</p>
            <ul>
              <li>Annual Service</li>
              <li>Major Service</li>
              <li>Repair/ Fault</li>
              <li>Major Repair</li>
              <li>Crash Repair</li>
              <li>Scratch and Dent Repairs</li>
              <li>Spray Painting</li>
              <li>Used Car for Sale or Scrap</li>
            </ul>
          </div>
          <div class="card-footer">
            <a href="sub_services.php" class="btn btn-primary">Find Out More!</a>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-5">
        <div class="card h-100">
          <img class="card-img-top" src="img/car_parts_1.png" alt="Car Parts">
          <div class="card-body">
            <h4 class="card-title">Car Parts</h4>
            <p class="card-text">We supply a large range car parts, such as:</p>
            <ul>
              <li>Exhausts</li>
              <li>Clutches</li>
              <li>Batteries</li>
              <li>Timing Belts</li>
              <li>Suspensions</li>
              <li>Brakes</li>
              <li>Tyres</li>

              <li>and whole lot more...</li>
            </ul>
          </div>
          <div class="card-footer">
            <a href="sub_parts.php" class="btn btn-primary">Find Out More!</a>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-5">
        <div class="card h-100">
          <img class="card-img-top" src="img/car_diagnostics_2.jpg" alt="Car Diagnostic">
          <div class="card-body">
            <h4 class="card-title">Car Diagnostic</h4>
            <p class="card-text">Our car diagnostics service will help get to get the source of the problem quickly.</p>
          </div>
          <div class="card-footer">
            <a href="sub_diagnostic.php" class="btn btn-primary">Find Out More!</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>


  <!-- /.row -->


  <!-- /.container -->

  <!--logo images-->
  <div class="container carlogos">
    <img src="img/carlogos/audi.png">
    <img src="img/carlogos/bmw.png">
    <img src="img/carlogos/fiat.png">
    <img src="img/carlogos/subaru.jpeg">
    <img src="img/carlogos/mini.png">
    <img src="img/carlogos/maserati.png">
    <img src="img/carlogos/ford.png">
    <img src="img/carlogos/hyundai.png">
    <img src="img/carlogos/kia.png">
    <img src="img/carlogos/mercedes.png">
    <img src="img/carlogos/opel.png">
    <img src="img/carlogos/peugeot.png">
    <img src="img/carlogos/toyota.png">
    <img src="img/carlogos/vw.png">
    <img src="img/carlogos/volvo.png">
  </div>

  <!-- Footer -->
  <?php require 'includes/footer.php'?>
    <!--/.container -->
    <!--/footer>


</body>

</html>