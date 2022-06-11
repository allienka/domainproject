<?php
//Start session
session_start();
//Check whether the session variable SESS_MEMBER_ID is present or not
if (!isset($_SESSION['user_name']) || 
   (trim($_SESSION['user_name']) == '')) {
    header("location: login.php");
    exit();
}
?>