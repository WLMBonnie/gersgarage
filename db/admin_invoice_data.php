<?php require 'db.php';


$app_id = isset($_GET['app_id']) ? $_GET['app_id'] : -1;
$cus_id = isset($_GET['cus_id']) ? $_GET['cus_id'] : -1;

if($app_id == -1 || $cus_id == -1){
    die("test");
}

function getInvoice($conn, $app_id){
    $stmt = $conn->prepare("SELECT * FROM `Invoice` as i, `Appointment` as a, `Customer` as c where i.app_id = a.app_id and i.cus_id = c.cus_id and i.app_id = ?");
    $stmt->bind_param('i', $app_id);
    $stmt->execute();

    $result = $stmt->get_result();
    $stmt->close();
    return $result;
}


$result = getInvoice($conn, $app_id);
if($result->num_rows > 0){
    
    $invoice = $result->fetch_assoc();
        
}else{
    
    $stmt = $conn->prepare("INSERT INTO `Invoice` (`inv_id`, `app_id`, `cus_id`, `issue_time`, `total_price`) VALUES (NULL, ?, ?, ?, ?)");
    $issue_time = date('Y-m-d H:i:s');
    $price = '0';
    $stmt->bind_param('iiss', $app_id, $cus_id, $issue_time, $price);
    $stmt->execute();
    $last_id = $stmt->insert_id;

    $result = getInvoice($conn, $app_id);
    $invoice = $result->fetch_assoc();
    $stmt->close();
}


$stmt = $conn->prepare("SELECT * FROM `Services` order by ser_name");
$stmt->execute();

$services = array();
$result = $stmt->get_result();
while($row = $result->fetch_assoc()) {
    array_push($services, $row);
} 
$stmt->close();


$stmt = $conn->prepare("SELECT * FROM `Parts` order by parts_name");
$stmt->execute();

$parts = array();
$result = $stmt->get_result();
while($row = $result->fetch_assoc()) {
    array_push($parts, $row);
} 
$stmt->close();


$stmt = $conn->prepare("SELECT * FROM `Invoice_Service` where inv_id = ? order by in_se_id");
$stmt->bind_param('i', $invoice['inv_id']);
$stmt->execute();

$added_services = array();
$result = $stmt->get_result();
while($row = $result->fetch_assoc()) {
    array_push($added_services, $row);
} 
$stmt->close();

$stmt = $conn->prepare("SELECT * FROM `Invoice_Parts` where inv_id = ? order by in_pt_id");
$stmt->bind_param('i', $invoice['inv_id']);
$stmt->execute();

$added_parts = array();
$result = $stmt->get_result();
while($row = $result->fetch_assoc()) {
    array_push($added_parts, $row);
} 
$stmt->close();

$conn->close();

?>
