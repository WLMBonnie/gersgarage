<?php require 'db.php';

$login = $_POST["login_name"];
$password = $_POST["login_password"];

$super_user = isset($_POST['super_user']) ? $_POST['super_user'] : false;

$sql = "SELECT * FROM `Customer` WHERE login_name='" . $login. "' and login_password = '" . $password . "'";

if($super_user){
    $sql = "SELECT * FROM `Staff` WHERE `username` = '" . $login. "' and `password` = '" . $password . "' and `role` = 'SuperUser'";
}

$result = $conn->query($sql);

if ($result->num_rows > 0) {

//create a session to store login status in the cookies that the other pages would not request you login again until you clear the cookies
    
    session_start();
    $_SESSION = array();
    
    $_SESSION["login_status"] = "success";

    while($row = $result->fetch_assoc()) {
        if($super_user){
            $_SESSION["username"] = $row["username"];
            $_SESSION["staff_id"] = $row["staff_id"];
            $_SESSION["staff_role"] = $row["role"];
        }else{
            $_SESSION["username"] = $row["f_name"];
            $_SESSION["cus_id"] = $row["cus_id"];
        }
        
    }
    print_r($_SESSION);
    header('Location: /gersgarage/index.php');
    
} else {
    echo $sql;
    header('Location: /gersgarage/login_failed.php');
}
$conn->close();

?>
