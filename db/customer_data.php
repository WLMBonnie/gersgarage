<?php require 'db.php';

$records = array();
$cus_id =  $_SESSION['cus_id'];

$stmt = $conn->prepare("SELECT * FROM `Appointment` as a, `Customer` as c WHERE a.cus_id = c.cus_id and c.cus_id = ? order by a.date desc");
$stmt->bind_param('i', $cus_id);
$stmt->execute();

$result = $stmt->get_result();
if($result->num_rows > 0){
    
    while($row = $result->fetch_assoc()) {
        array_push($records, $row);
    }  
}else{
    echo 'error';
}

$stmt->close();
$conn->close();

?>
