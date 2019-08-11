<?php require 'db.php';

$fname = $_POST["first_name"];
$lname = $_POST["last_name"];

$email = $_POST["email"];
$phone = $_POST["phone"];

$login = $_POST["login_name"];
$password = $_POST["login_password"];

$addr1 = $_POST["address_line1"];
$addr2 = $_POST["address_line2"];
$addr3 = $_POST["address_line3"];

$sql = "INSERT INTO `Customer` (`cus_id`, `email`, `l_name`, `f_name`, `phone`, `login_password`, `address_line1`, `address_line2`, `address_line3`, `login_name`)"
. "VALUES (NULL, '" . $email . "', '" . $lname . "', '" . $fname . "', '" . $phone ."', '" . $password ."', '" . $addr1 ."', '" . $addr2 ."', '" . $addr3 . "', '" . $login . "')";

if ($conn->query($sql) === TRUE) {
    $last_id = $conn->insert_id;
    header('Location: /gersgarage/sign_up_successfully.php');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>
