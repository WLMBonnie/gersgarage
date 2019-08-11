<?php 
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 

require 'db.php';

$date = $_POST['appointment_date'];
$date = date_create($date);
$date = date_format($date,"Y-m-d");
$service_type = $_POST['service_type'];
$vehicle_type = $_POST['vehicle_type'];
$vehicle_make = $_POST['vehicle_make'];
$vehicle_license = $_POST['vehicle_license'];
$vehicle_engine = $_POST['vehicle_engine'];
$note = $_POST['note'];

$cus_id = $_SESSION["cus_id"];

$stmt = $conn->prepare("INSERT INTO `Appointment` (`app_id`, `cus_id`, `staff_id`, `engine_type`, `service_type`, `vechicle_licence`, `note`, `status`, `date`, `vehicle_make`, `vehicle_type`) VALUES (NULL, ?, NULL, ?, ?, ?, ?, 'Booked', ?, ?, ?)");
$stmt->bind_param('isssssss', $cus_id, $vehicle_engine, $service_type, $vehicle_license, $note, $date, $vehicle_make, $vehicle_type);

$stmt->execute();
$last_id = $stmt->insert_id;
if ($last_id > 0) {
   header('Location: /gersgarage/booking_thankyou.php');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$stmt->close();
$conn->close();

?>
