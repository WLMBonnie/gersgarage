<?php require 'db.php';


$stmt = $conn->prepare("SELECT type, make FROM `Vehicle` order by make");

$stmt->execute();

$result = $stmt->get_result();
if($result->num_rows > 0){
    $cars = array();
    $vans = array();
    $buses = array();
    $bikes = array();
    while($row = $result->fetch_assoc()) {

        if($row['type'] == 'Car'){     
            array_push($cars, $row['make']);
        }elseif($row['type'] =='Small Van'){
            array_push($vans, $row['make']);
        }elseif($row['type'] == 'Bus'){
            array_push($buses, $row['make']);
        }elseif($row['type'] == 'Motorbike'){
            array_push($bikes, $row['make']);
        }
    }

    $_SESSION['cars'] = json_encode($cars);
    $_SESSION['vans'] = json_encode($vans);
    $_SESSION['buses'] = json_encode($buses);
    $_SESSION['bikes'] = json_encode($bikes);
}else{
    echo 'error';
}

$stmt->close();



$stmt = $conn->prepare("SELECT date, count(*) as bookings FROM `Appointment` where date > curdate() group by date");

$stmt->execute();

$result = $stmt->get_result();
if($result->num_rows > 0){
    $avail = array();
  
    while($row = $result->fetch_assoc()) {
        $avail[$row['date']] = $row['bookings'];
    }

    $avail = json_encode($avail);

}else{
    echo 'error';
}

$stmt->close();

$stmt = $conn->prepare("SELECT * FROM `Services`");
$stmt->execute();

$services = array();
$result = $stmt->get_result();
if($result->num_rows > 0){
    
    while($row = $result->fetch_assoc()) {
        array_push($services, $row);
    }
    
}

// print_r($services);


$stmt->close();

$conn->close();

?>
