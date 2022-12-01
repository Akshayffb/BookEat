<?php

session_start();
session_destroy();
// $_SESSION['user_login']=TRUE;
// $_SESSION['admin_login']=FALSE;

// if($_SESSION['admin_login']){
//     header('location: userlogin.php');

// }

header('location: userlogin.php');

?>