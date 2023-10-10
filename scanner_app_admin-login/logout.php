<?php
session_start();

$user_name_cookie = "username_cookie";

if(!isset($_COOKIE[$user_name_cookie]))
{
  header("Location: login.php");
}

if(isset($_GET['logout']))
{
  session_destroy();
  setcookie($user_name_cookie, null, -1, '/');
//   setcookie('findmymeds_emp', null, -1, '/');
  header("Location: login.php");
}
?>
