<?php
session_start();
session_unset();
session_destroy();

//if(!isset($_SESSION['userRow']))
//{
echo 'Logging out..';
header( "Refresh:1; url=../index.php")
//}
//else if(isset($_SESSION['userRow'])!="")
//{
// header("Location: /user_profiles/profile.php");
//}
//
//if(isset($_GET['logout']))
//{
// session_destroy();
// unset($_SESSION['userRow']);
// header("Location: /index.php");
//}
?>