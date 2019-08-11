<?php 
require 'db.php';

$cus_id = $_POST['cus_id'];
$app_id = $_POST['app_id'];
$inv_id = $_POST['inv_id'];
$part = explode('_', $_POST['part']);
$part_id = $part[0];
$price = $part[1];
$part_name = $part[2];

$cus_id = $_SESSION["cus_id"];

$stmt = $conn->prepare("INSERT INTO `Invoice_Parts` (`in_pt_id`, `inv_id`, `parts_id`, `price`, `details`) VALUES (NULL, ?, ?, ?, ?)");
$stmt->bind_param('iiss', $inv_id, $part_id, $price, $part_name );

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
