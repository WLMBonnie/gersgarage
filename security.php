<?php
        if(!isset($_SESSION["login_status"])){
            header('Location: /gersgarage/sign_in.php');
        }else if($_SESSION["login_status"] != "success"){
            header('Location: /gersgarage/sign_in.php');
        }
?>