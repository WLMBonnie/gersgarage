<?php
        if(!isset($_SESSION["staff_role"])){
            header('Location: /gersgarage/sign_in.php');
        }else if($_SESSION["staff_role"] != "SuperUser"){
            header('Location: /gersgarage/sign_in.php');
        }
?>