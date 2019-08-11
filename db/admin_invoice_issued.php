<?php require 'db.php';


$app_id = isset($_GET['app_id']) ? $_GET['app_id'] : -1;
$inv_id = isset($_GET['inv_id']) ? $_GET['inv_id'] : -1;

if($app_id == -1 || $inv_id == -1){
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

function getTotalPrice($conn, $inv_id){
    $sql = "SELECT SUM(PRICE) as price FROM (SELECT price FROM Invoice_Service WHERE inv_id = ? UNION SELECT price FROM Invoice_Parts WHERE inv_id = ?) as p";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ii', $inv_id, $inv_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
    return $result;
}

function updateInvoice($conn, $price, $inv_id){
    $stmt = $conn->prepare("UPDATE `Invoice` SET total_price = ?, issue_time = current_timestamp WHERE inv_id = ?");
    $stmt->bind_param('ii', $price, $inv_id);
    $result = $stmt->execute();
    $stmt->close();
    return $result;
}

$result = getTotalPrice($conn, $inv_id);
if($result->num_rows > 0){
    
    $row = $result->fetch_assoc();
    $price = $row['price'];

    if(updateInvoice($conn, $price, $inv_id)){
        
    }
        
}

$result = getInvoice($conn, $app_id);
if($result->num_rows > 0){
    
    $invoice = $result->fetch_assoc();
        
}


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
