<!DOCTYPE html>
<html lang="en">


<?php require 'includes/head.php'?>
<?php require 'admin_security.php'?>
<?php require 'db/admin_invoice_data.php'?>
<body class="d-flex flex-column">
<script>
$( function() {
    $( "#inputDate" ).datepicker({
      dateFormat: "yy-mm-dd"
    });
  } );


  function changeDate(){
    window.location.href = '/gersgarage/admin.php?date=' + $("#inputDate").val();
  }

  function issueInvoice(){
    var win = window.open('invoice_issued.php?app_id=<?php echo $invoice['app_id']?>&inv_id=<?php echo $invoice['inv_id'] ?>');
  }
</script>
  <!-- Navigation -->
  <?php require 'includes/navigation.php'?>


  <!-- Header -->
  <header class="bg-primary py-5 mb-5">
    <div class="container h-100">
      <div class="row h-100 align-items-center">
        <div class="col-lg-12">
          <strong class="display-4 text-white mt-5 mb-2">Invoice</strong>
        </div>
      </div>
    </div>
  </header>

   <!-- Page Content -->
  <div class="container">

    <div class="row">
    <div class="col-md-12 mb-5">
    
    <div class="form-row">
    <div class="form-group col-md-6">
        <form action="db/admin_invoice_add_service.php" method="POST">
            <input type="hidden" value="<?php echo $invoice['cus_id']?>" name="cus_id">
            <input type="hidden" value="<?php echo $invoice['app_id']?>" name="app_id">
            <input type="hidden" value="<?php echo $invoice['inv_id']?>" name="inv_id">
            
            <div class="container-fluid">
                  <div class="row  no-gutters">
                  
                    <div class="col-10">
                    
                            <select name="service" class="form-control" id="inputService">
                    <?php
                        $arrlength = count($services);
                        
                        for($x = 0; $x < $arrlength; $x++) {
                            $ser = $services[$x];
                            echo "<option value=\"" . $ser['ser_id'] . "_" . $ser['price'] . "_" . $ser['ser_name'] . "\">" . $ser['ser_name'] . "  &euro;" . $ser['price'] . " </option>";
                        }
                        ?>
                    </select>
                    </div>
                    <div class="col-2">
                    <button type="submit" class="btn btn-success">+</button>
                    </div>
                  </div>
                </div>
            
            
           
        </form>
      
    </div>
    <div class="form-group col-md-6">
    <form action="db/admin_invoice_add_part.php" method="POST">
            <input type="hidden" value="<?php echo $invoice['cus_id']?>" name="cus_id">
            <input type="hidden" value="<?php echo $invoice['app_id']?>" name="app_id">
            <input type="hidden" value="<?php echo $invoice['inv_id']?>" name="inv_id">
            
                <div class="container-fluid">
                  <div class="row  no-gutters">
                
                    <div class="col-10">
                              <select name="part" class="form-control" id="inputPart">
                      <?php
                          $arrlength = count($parts);
                          
                          for($x = 0; $x < $arrlength; $x++) {
                              $part = $parts[$x];
                              echo "<option value=\"" . $part['parts_id'] . "_" . $part['price'] . "_" . $part['parts_name'] . "\">" . $part['parts_name'] . "  &euro;" . $part['price'] . " </option>";
                          }
                          ?>
                      </select>
                    </div>
                    <div class="col-2">
                    <button type="submit" class="btn btn-success">+</button>
                    </div>
                  </div>
                </div>
             
            
            
        
        </form>
    </div>
  </div>
   
    
  <div class="table-responsive">
        <table class="table table-striped">
        <?php 
            
            echo "<tr>";
            echo "<td width=\"50%\">Customer </td><td>" . $invoice['f_name'] . " " . $invoice['l_name'] .  "</td>";
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
                echo "<form action=\"db/admin_invoice_remove_service.php\" method=\"POST\" class=\"inline-blk\">";
                echo "<input type=\"hidden\" value=\"" . $added_service['in_se_id'] . "\" name=\"in_se_id\">";
                echo "<input type=\"hidden\" value=\"" . $invoice['cus_id'] . "\" name=\"cus_id\">";
                echo "<input type=\"hidden\" value=\"" . $invoice['app_id'] . "\" name=\"app_id\">";
                echo "<input type=\"hidden\" value=\"" . $invoice['inv_id'] . "\" name=\"inv_id\">";
                echo "&nbsp;&nbsp;<button type=\"submit\" class=\"btn btn-danger btn-sm\">X</button>";
                echo "</form>";
                echo "</td><td>&euro;" . $added_service['price'] . "</td>";
                echo "</tr>";
            }
   
            $arrlength = count($added_parts);
                
            for($x = 0; $x < $arrlength; $x++) {
                $added_part = $added_parts[$x];
                echo "<tr>";
                echo "<td>" . $added_part['details'];
                echo "<form action=\"db/admin_invoice_remove_part.php\" method=\"POST\" class=\"inline-blk\">";
                echo "<input type=\"hidden\" value=\"" . $added_part['in_pt_id'] . "\" name=\"in_pt_id\">";
                echo "<input type=\"hidden\" value=\"" . $invoice['cus_id'] . "\" name=\"cus_id\">";
                echo "<input type=\"hidden\" value=\"" . $invoice['app_id'] . "\" name=\"app_id\">";
                echo "<input type=\"hidden\" value=\"" . $invoice['inv_id'] . "\" name=\"inv_id\">";
                echo "&nbsp;&nbsp;<button type=\"submit\" class=\"btn btn-danger btn-sm\">X</button>";
                echo "</form>";
                echo "</td><td>&euro;" . $added_part['price'] . "</td>";
                echo "</tr>";
            }

        ?>
        </table>
        </div>
        <br>
        <br>
        <button type="button" class="btn btn-primary" onclick="issueInvoice()">Issue</button>
          <a class="btn btn-primary" href="admin.php">Back to admin</a>
          
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
