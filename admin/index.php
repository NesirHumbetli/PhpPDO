<?php 
ob_start();
session_start();
if(isset($_SESSION['user_ad'])) {

    Header("Location:production");
}else {

    Header("Location:production/login.php");
}



?>