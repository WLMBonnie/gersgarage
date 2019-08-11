<?php

//remove PHPSESSID from browser
// if ( isset( $_COOKIE[session_name()] ) ){
//     setcookie( session_name(), "", time()-3600, "/" );

//     session_start();
//     // remove all session variables
//     session_unset(); 
//     // destroy the session 
//     session_destroy(); 

// }

session_start();
$_SESSION = array();
header('Location: /gersgarage/index.php');

?>