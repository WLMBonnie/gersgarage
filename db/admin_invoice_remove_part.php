<?php 
require 'db.php';

$id = $_POST['in_pt_id'];
$cus_id = $_POST['cus_id'];
$app_id = $_POST['app_id'];
$inv_id = $_POST['inv_id'];

$stmt = $conn->prepare("DELETE FROM `Invoice_Parts` WHERE in_pt_id = ?");
$stmt->bind_param('i', $id);

if($stmt->execute()){
   header('Location: /gersgarage/invoice.php?app_id=' . $app_id . '&cus_id=' . $cus_id);
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$stmt->close();
$conn->close();

?>
