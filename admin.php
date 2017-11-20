<?php
session_start();
if($_SESSION['validated'] !="true")
{
  header("Location: login.php?error=2");
}
include'header.php';
include'body.php';
echo "welcome admin";
include'footer.php';
?>
