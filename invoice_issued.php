<!DOCTYPE html>
<html lang="en">


<?php require 'includes/head.php'?>
<?php require 'admin_security.php'?>
<?php require 'db/admin_invoice_issued.php'?>
<body class="d-flex flex-column">
<script>
function print_invoice(){
  $('#print_btn').hide();
  window.print();
  $('#print_btn').show();
}
</script>

 
  <!-- Header -->
  <header class="bg-primary py-5 mb-5">
    <div class="container h-100">
      <div class="row h-100 align-items-center">
        <div class="col-lg-12">
          <strong class="display-4 text-white mt-5 mb-2">The Ger's Garage Limited</strong>
        </div>
      </div>
    </div>
  </header>

   <!-- Page Content -->
  <div class="container">

    <div class="row">
    <div class="col-md-12 mb-5">
    <h2>Invoice</h2>
    <p>issue time : <?php echo $invoice['issue_time'] ?></p>
    <div class="table-responsive">
        <table class="table table-striped">
        <?php 
            
            echo "<tr>";
            echo "<td>Customer </td><td>" . $invoice['f_name'] . " " . $invoice['l_name'] .  "</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td>Phone </td><td>" . $invoice['phone'] . "</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td>Vehicle</td><td>" . $invoice['vehicle_type'] . " - " . $invoice['vehicle_make'] .  "</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td>License </td><td>" . $invoice['vechicle_licence'] . "</td>";
            echo "</tr>";
          
            $arrlength = count($added_services);
                
            for($x = 0; $x < $arrlength; $x++) {
                $added_service = $added_services[$x];
                echo "<tr>";
                echo "<td>" . $added_service['details'];
                echo "</td><td>&euro;" . $added_service['price'] . "</td>";
                echo "</tr>";
            }
   
            $arrlength = count($added_parts);
                
            for($x = 0; $x < $arrlength; $x++) {
                $added_part = $added_parts[$x];
                echo "<tr>";
                echo "<td>" . $added_part['details'];
                echo "</td><td>&euro;" . $added_part['price'] . "</td>";
                echo "</tr>";
            }

            echo "<tr>";
            echo "<td><h4>Total";
            echo "</h4></td><td><h4><u>&euro;" . $invoice['total_price'] . "</u></h4></td>";
            echo "</tr>";

        ?>
        </table>
        </div>
        <br>
        <button id="print_btn" type="button" class="btn btn-primary" onclick="print_invoice()">Print</button>          
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
