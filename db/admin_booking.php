<?php require 'db.php';

$date = $_POST["date"];
$count = 0;
for($i = 0; $i < count($_POST["app_status"]); $i++) {

    $app_status = explode("_", $_POST["app_status"][$i]);
    $app_staff = explode("_", $_POST["app_staff"][$i]);

    $app_id = $app_status[0];
    $status = $app_status[1];
    $staff_id = $app_staff[1];
    
    $stmt = $conn->prepare("UPDATE `Appointment` SET status = ?, staff_id = ? WHERE app_id = ? and date = ?");
    $stmt->bind_param('siis', $status, $staff_id, $app_id, $date);    
    $stmt->execute();
    $count++;
}


if($count == count($_POST["app_status"])){
    header('Location: /gersgarage/admin.php?date='.$date);
}else{
    echo 'error';
}

$stmt->close();
$conn->close();

?>
