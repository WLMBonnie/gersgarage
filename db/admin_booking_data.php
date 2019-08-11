<?php require 'db.php';
//https://www.w3schools.com/php/func_date_create_from_format.asp
$appointments = array();
$staffs = array();

$date = isset($_GET['date']) ? $_GET['date'] : date("Y-m-d");

$stmt = $conn->prepare("SELECT * FROM `Appointment` as a , `Customer` as c where a.cus_id = c.cus_id and a.date = ?");
$stmt->bind_param('s', $date);
$stmt->execute();

$result = $stmt->get_result();
if($result->num_rows > 0){
    
    while($row = $result->fetch_assoc()) {
        array_push($appointments, $row);
    }  
}
$stmt->close();

$stmt = $conn->prepare("SELECT * FROM `Staff`");
$stmt->execute();

$staffJson = array();
$result = $stmt->get_result();
if($result->num_rows > 0){
    
    while($row = $result->fetch_assoc()) {
        array_push($staffs, $row);
        $staffJson[$row['staff_id']] = $row;
    }
    $staffJson = json_encode($staffJson);
}


$stmt->close();

$stmt = $conn->prepare("SELECT * FROM `Services`");
$stmt->execute();

$services = array();
$servicesJson = array();
$result = $stmt->get_result();
if($result->num_rows > 0){
    
    while($row = $result->fetch_assoc()) {
        $servicesJson[$row['ser_name']] = $row['workload'];
        $services[$row['ser_name']] = $row;
    }
    
    $servicesJson = json_encode($servicesJson);
}


$stmt->close();
$conn->close();

?>
