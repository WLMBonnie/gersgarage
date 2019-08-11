<?php 
require 'db.php';

$cus_id = $_POST['cus_id'];
$app_id = $_POST['app_id'];
$inv_id = $_POST['inv_id'];
$ser = explode('_', $_POST['service']);
$ser_id = $ser[0];
$price = $ser[1];
$ser_name = $ser[2];

$stmt = $conn->prepare("INSERT INTO `Invoice_Service` (`in_se_id`, `inv_id`, `ser_id`, `price`, `details`) VALUES (NULL, ?, ?, ?, ?)");
$stmt->bind_param('isss', $inv_id, $ser_id, $price, $ser_name );

$stmt->execute();
$last_id = $stmt->insert_id;
if ($last_id > 0) {
   header('Location: /gersgarage/invoice.php?app_id=' . $app_id . '&cus_id=' . $cus_id);
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$stmt->close();
$conn->close();

?>
